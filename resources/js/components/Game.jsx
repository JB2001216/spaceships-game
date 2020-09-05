import React, { useCallback, useEffect, useState } from 'react'
import GameScreen from './GameScreen'
let Logger = require('js-logger')

const Gametypes = {
    People: 'people',
    Starships: 'starships'
}

const initialState = {
    winner: {
        name: '',
        stats: {}
    },
    loser: {
        stats: {}
    },
    time: ''
}

let runGame = function (gameType, playPersonApiEndpoint, setGame, playStarshipsApiEndpoint) {
    switch (gameType) {
        case Gametypes.People:
            return fetch(playPersonApiEndpoint, { method: 'POST' })
                .then(res => res.json())
                .then((response) => {
                    setGame(response)
                }).catch((response) => {
                    alert('Problem contacting the server.')
                })
        case Gametypes.Starships:
            return fetch(playStarshipsApiEndpoint, { method: 'POST' })
                .then(res => res.json())
                .then((response) => {
                    setGame(response)
                }).catch(() => {
                    alert('Problem contacting the server.')
                })
        default:
            throw new Error('Invalid game type.')
    }
}

function Game ({ initialGameType, playPersonApiEndpoint, playStarshipsApiEndpoint }) {

    let [initialDataLoaded, setInitialDataLoaded] = useState(false)
    let [gameType, setGameType] = useState(initialGameType)
    let [game, setGame] = useState(initialState)
    Logger.debug(game)
    useEffect(() => {
        runGame(gameType, playPersonApiEndpoint, setGame, playStarshipsApiEndpoint).then(() => {
            setInitialDataLoaded(true)
        })
    }, [])

    let handlePersonClick = useCallback(() => {
        setGameType(Gametypes.People)
        runGame(Gametypes.People, playPersonApiEndpoint, setGame, playStarshipsApiEndpoint)
    }, [])

    let handleStarshipClick = useCallback(() => {
        setGameType(Gametypes.Starships)
        runGame(Gametypes.Starships, playPersonApiEndpoint, setGame, playStarshipsApiEndpoint)
    }, [])

    if (!initialDataLoaded) return <p className='text-center'>Loading...</p>

    return <GameScreen
        game={game} gameType={gameType} onPersonClick={handlePersonClick}
        onStarshipClick={handleStarshipClick}
    />
}

export default Game
