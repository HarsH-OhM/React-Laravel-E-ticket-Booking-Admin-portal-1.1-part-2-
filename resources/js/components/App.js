
  import React, { Component } from 'react'
  import ReactDOM from 'react-dom'
  import { BrowserRouter, Route, Switch, Link } from 'react-router-dom'

  
  import 'bootstrap/dist/css/bootstrap.min.css';
  import "./app.css";

import home from './view/Home';
import About from './view/About';
import Contact from './view/Contact';
import Error from './view/Error';
import Navigation from './view/Navigation';
import DisplayItem from './view/DisplayItem';


  class App extends Component {
    render () {
      return (
        <BrowserRouter>
         <div>
          <Navigation />
            <Switch>
                <ul className="header">

               

             <li><Route path="/" component={home} exact/></li>
            
            <li> <Route path="/about" component={About}/></li>
            
            <li><Route path="/contact" component={Contact}/></li>


            <li><Route Link="/bookform" /></li>

         <li><Route path="/display-item" component={DisplayItem} /></li>
            

         


            <Route component={Error}/>

            </ul>
            
           </Switch>

        </div>
        </BrowserRouter>
      )
    }
  }

  ReactDOM.render(<App />, document.getElementById('app'))