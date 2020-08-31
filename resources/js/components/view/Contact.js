//ticket booking for traveles

import React from 'react';

import 'bootstrap/dist/css/bootstrap.min.css';
import { Component } from 'react';
 


// const Contact = () => {

class Contact extends Component {
  
  
  render(){
    return (
       <div className="content">
         
       

         {/* <div class="bg-light"> */}
         <div class="back"> 
           <br/>

<div class="col-lg-8 offset-lg-2">

<h4>Add Travelers Info.</h4>
<br/>

<p><a href="/bookform">go beta</a></p>

<form method="get" action="{{ url('bookt') }}">
  

<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputfname">First Name</label>
      <input type="text" name="fname" class="form-control"   required/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputlname">Last Name</label>
      <input type="text" class="form-control" name="lname"  required/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="email"  required/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPhone4">Phone</label>
      <input type="tel" class="form-control" name="phone"  required/>
    </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address" placeholder="1234 Main St"  required/>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" name="city"  required/>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <input type="text" class="form-control" name="state"  required/>
      {/* <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>...</option>
      </select> */}
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Zip</label>
      <input type="text" class="form-control" name="zip"  required/>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputsrc">From</label>
      <input type="text" class="form-control"  Placeholder="Source" name="from"  required/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputdest">To</label>
      <input type="text" class="form-control" Placeholder="Destination" name="to"  required/>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Total no. of Adultes</label>
      <input type="number" class="form-control" name="ano"  required/>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Total no. of Children</label>
      <input type="number" class="form-control" name="cno"  required/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Add Adultes Name and Ages</label>
      <textarea type="text" class="form-control" name="aname"  required/>
    </div>
    <div class="form-group col-md-6">
    
      <label for="inputEmail4">Add Children Name and Ages</label>
      <textarea type="text" class="form-control" name="cname"  required/>
    </div>
    
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="fileupload">Upload Document</label>
      <input type="File" name="doc"   class="form-control" multiple  required/>
    </div>
    <div class="form-group col-md-6">
      <label for="date">Date Of Visit</label>
      <input type="date" class="form-control" Placeholder="Date Of Visit" name="date"  required/>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck" required/>
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Book</button>
</form>


</div>
</div>

      </div>
    );
  }
}
 
export default Contact;

