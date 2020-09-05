import ReactDOM from 'react-dom'

const Logger = require('js-logger')

let renderComponent = (document, id, createComponentCallback) => {
    let element = document.getElementById(id)
    if (element) {
        let component = createComponentCallback(element)
        ReactDOM.render(component, element)
        return
    }

    Logger.error(`Element #${id} not found.`)
    throw new Error('Could not render the component.')
}

export default renderComponent
