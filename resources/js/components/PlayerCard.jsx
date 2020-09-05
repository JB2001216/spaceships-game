import React from 'react'

function PlayerCard ({ player }) {
    return <div className="card">
        <div className="card-header">{player.name}
            <span className='float-right'>Score: {player.wins - player.losses}</span>
        </div>

        <div className="card-body">
            <p>Wins: {player.wins}</p>
            <p>Losses: {player.losses}</p>
            <p>Stats: </p>
            {Array.from(Object.keys(player.stats)).map((key) => {
                let stat = player.stats[key]
                return <p>{key.toUpperCase()} {stat}</p>
            })}
        </div>
    </div>
}

export default PlayerCard
