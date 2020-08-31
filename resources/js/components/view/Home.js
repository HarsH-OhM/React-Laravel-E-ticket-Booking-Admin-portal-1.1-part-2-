

import React, {Component} from 'react';

import {browserHistory} from 'browser-history';

 
// const home = () => {
//     return (
//         <div className="content">

// <div class="back">
// <br/>

//         <h1>Home</h1>
//            <p>Home page body content</p>
            
//           <h2>HELLO</h2>
//         <p>Cras facilisis urna ornare ex volutpat, et
//         convallis erat elementum. Ut aliquam, ipsum vitae
//         gravida suscipit, metus dui bibendum est, eget rhoncus nibh
//         metus nec massa. Maecenas hendrerit laoreet augue
//         nec molestie. Cum sociis natoque penatibus et magnis
//         dis parturient montes, nascetur ridiculus mus.</p>
 
//         <p>Duis a turpis sed lacus dapibus elementum sed eu lectus.</p>
       


//              </div>
// </div>
//     );
// }

class home extends Component {
    constructor(props){
      super(props);
      this.state = {productName: '', productPrice: ''};
  
      this.handleChange1 = this.handleChange1.bind(this);
      this.handleChange2 = this.handleChange2.bind(this);
      this.handleSubmit = this.handleSubmit.bind(this);
    }
    handleChange1(e){
      this.setState({
        productName: e.target.value
      })
    }
    handleChange2(e){
      this.setState({
        productPrice: e.target.value
      })
    }
    handleSubmit(e){
      e.preventDefault();
      const products = {
        name: this.state.productName,
        price: this.state.productPrice
      }
      
      let uri = 'http://localhost:8000/items';
      axios.post(uri, products).then((response) => {
        browserHistory.push('/display-item');
      });
    }
  
      render() {
        return (
        <div>

        <div className="content">

 <div class="back">
 <br/>
          <h1>Create An Item</h1>
          <form onSubmit={this.handleSubmit}>
            <div className="row">
              <div className="col-md-6">
                <div className="form-group">
                  <label>Item Name:</label>
                  <input type="text" className="form-control" onChange={this.handleChange1}/>
                </div>
              </div>
              </div>
              <div className="row">
                <div className="col-md-6">
                  <div className="form-group">
                    <label>Item Price:</label>
                    <input type="text" className="form-control col-md-6" onChange={this.handleChange2}/>
                  </div>
                </div>
              </div><br />
              <div className="form-group">
                <button className="btn btn-primary">Add Item</button>
              </div>
          </form>

          </div>

          </div>
    </div>
        )
      }
  }
 
export default home;