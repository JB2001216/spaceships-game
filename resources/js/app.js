import Game from './components/Game'
import React from 'react'
import renderComponent from './utilities/render-component'

require('./bootstrap')

renderComponent(document, 'game', (game) => {
    return <Game initialGameType={game.dataset.initialGameType}
                 playPersonApiEndpoint={game.dataset.playPersonApiEndpoint}
                 playStarshipsApiEndpoint={game.dataset.playStarshipApiEndpoint}
    />
})
