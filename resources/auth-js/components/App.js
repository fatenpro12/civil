import React, { Fragment } from 'react';
import ReactDOM from 'react-dom';
import Login from './Login';

function App() {
    if(JSON.parse(localStorage.getItem('token'))!=null)
    {
        window.location.href = '/';
    }
    else{
        return (
            <Fragment>
                <Login />
            </Fragment>
        );
    }

}

export default App;

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
