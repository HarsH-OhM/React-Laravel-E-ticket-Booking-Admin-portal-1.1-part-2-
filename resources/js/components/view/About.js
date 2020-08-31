import React from 'react';
import mine from '../images/mine.jpg';
const About = () => {
    return (
       <div className="content">
         

<div className="parent">


{/* <div class="bg-light"> */}
<div class="back"> 
  <div class="container py-5">
    <div class="row h-100 align-items-center py-5">
      <div class="col-lg-6">
        <h1 class="display-4">About This Site</h1>
        <p class="lead  mb-0">it's a react and bootstrap based website where you can Track the Covid-19 affected cases globaly and also for state wise cases for india.  still on development. </p>
        <h5>for more details cheak my github profile: <a href="https://github.com/HarsH-OhM">click here!</a></h5>
        
        {/* <h4 class="display-4">About me</h4>
        <p>Hariom Malviya</p>
        <p>Full-Stack Developer & IOT Automation Developer</p>
        <p>Contact:gurjarhariom3114@gmail.com</p>
        <p>linkedin Profile:<a href="https://www.linkedin.com/in/hariom-malviya-614160148/">click here!</a></p>
         */}

<br/>
<div class="card">
  <h5 class="card-header">About me</h5>
  <div class="card-body">
  <p>Hariom Malviya</p>
        <p>Full-Stack Developer & IOT Automation Developer</p>
        <p>Contact:gurjarhariom3114@gmail.com</p>
    <a href="https://www.linkedin.com/in/hariom-malviya-614160148/" class="btn btn-primary" style={{ color : "black" }} >linkedin Profile</a>
  </div>
</div>
  </div>

<br/>

    
        
      <div className="col-lg-6 d-none d-lg-block"><img src={mine} alt="" className="img-fluid rounded-circle"/></div>
    </div>
    {/* <div class="like">               //like button code
       <h4>If you like my work..please click the like button.</h4>
        <button onclick={this.likebtn}>Likes: {this.state.count}</button>
        <p>Show some Love.</p>    
       
         
     </div> */}

     <div>

       
       </div>

     
  </div>
</div>   
  
</div>
       </div>
    );
}
 
export default About;