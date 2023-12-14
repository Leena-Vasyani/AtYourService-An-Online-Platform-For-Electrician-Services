<?php
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    session_start();
    include 'partials/_dbconnect.php';
    
    $username = $_POST['username'];
    $email = $_POST["email"];
    $review = $_POST['review'];
    $subject = $_POST['subject'];
    $id = $_POST['id'];

    if($username=='Nilesh Rao' || $username=='John Smith' || $username=='Aleena Sharma' || $username=='Olivia Fernandes' || $username=='Namo Pandey' || $username=='Sanjay Verma' || $username=='Priya Khanna' || $username=='Arun Chaudhary' || $username=='William James' || $username=='Lakshita Deshmukh')
    {
      echo "Members of professional team are not allowed to enter reviews!";
    }
    else{
      $sql = "INSERT INTO `reviews` (`username`, `email`, `subject`, `id`, `review`, `created_at`) VALUES ('$username', '$email', '$subject', '$id', '$review', current_timestamp())";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Your message was sent successfully. Thank you!";
    } else {
        echo "Error: Oopsie...message not sent! Try again!";
    }
  }
?>

<html>
    <head>
        <title>
            Review Us
        </title>
    </head>
    <link rel="stylesheet" href="review.css">
    <body>
        <div id="contact-form">
            <div>
                <h1>Nice to Meet You!</h1> 
                <h4>Have an opinion or just want to get in touch? Let's chat.</h4>
  
                <p id="failure">Oopsie...message not sent.</p>  
                <p id="success">Your message was sent successfully. Thank you!</p> 
            </div>
                   <form method="post" action="review.php">
                    <div>
                      <label for="username">
                          <span class="required">Username: *</span> 
                          <input type="text" id="username" name="username" value="" placeholder="Your Name" required="required" tabindex="1" autofocus="autofocus" />
                      </label> 
                    </div>
                    <div>
                      <label for="email">
                          <span class="required">Email: *</span>
                          <input type="email" id="email" name="email" value="" placeholder="Your Email" tabindex="2" required="required" />
                      </label>  
                    </div>
                    <div>		          
                      <label for="subject">
                      <span><strong>Subject:</strong> </span>
                          <select id="subject" name="subject" tabindex="4">   
                             <option value="Service Provider Review">Service Provider Review</option>
                             <option value="Complaint">Complaint</option>
                             <option value="Overall experience">Overall experience</option>
                             <option value="Suggestions">Suggestions</option>
                             <option value="Questions">Questions</option>
                          </select>
                      </label>
                    </div>
                    <div>
                        <label for="id">
                            <span class="required">Service Provider's ID: </span> 
                            <input type="text" id="id" name="id" value="" placeholder="Enter ID of service provider" required="required" tabindex="1" autofocus="autofocus" />
                        </label> 
                    </div>
                    <div>		          
                      <label for="review">
                          <span class="required">Review: *</span> 
                          <textarea id="review" name="review" placeholder="Please write your review here." tabindex="5" required="required"></textarea> 
                      </label>  
                    </div>
                    <div>		           
                      <button name="submit" type="submit" id="submit" >SUBMIT</button> 
                    </div>
                   </form>
        
            </div>
    </body>
</html>

