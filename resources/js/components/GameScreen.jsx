import React from 'react'
import PlayerCard from './PlayerCard'

function GameScreen ({ game, gameType, onPersonClick, onStarshipClick }) {
    let upperCaseGameType = gameType.toString().charAt(0).toUpperCase() + gameType.toString().slice(1)

    return (
        <div className="container">
            <div className="row justify-content-center">
                <h2>Playing against: {upperCaseGameType}</h2>
                <div className="col-md-10">
                    <div className="row">
                        <div className="col-md-5">Winner:
                            <PlayerCard player={game.winner}/>
                        </div>
                        <div className="col-md-1 text-center align-content-center my-5">
                            vs
                        </div>
                        <div className="col-md-5">Loser:
                            <PlayerCard player={game.loser}/>
                        </div>
                    </div>
                    <div className="row text-center">
                        <div className="col-md-12">
                            <p>{game.winner.name} has won!</p>
                            <p>Play again against:</p></div>
                    </div>
                    <div className="row">
                        <div className="col-md-6 offset-3 text-center">
                            <button className='btn btn-primary' onClick={onPersonClick}>
                                People
                            </button>
                            <button className='btn btn-primary mx-3' onClick={onStarshipClick}>
                                Starships
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default GameScreen
