const Validation = new JustValidate("#signup");

Validation
    .addField("#fname",[
        {
            rule: "required"
        }
       
    ] )
    .addField("#lname", [
        {
            rule: "required"
        }
    ])
    // .addField("#email",[
    //     {
    //         rule: "required"
    //     },
    //     {
    //         rule:"email"
    //     },
    //     {
    //         // validator:(value)=>()=>{
    //         // return fetch("validate_email.php= " + 
    //         // encodeURI(value))
    //         //  .then(function(response){
    //         //     return response.json();
    //         //  })
    //         //  .then(function(json){
    //         //     return json.available;
    //         //  })
    //         // },
    //         // errorMessage : "Email already taken"

    //     }
    // ])
    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"

        }
    ])
    .addField("#pwd", [
        {
           validator:(value, fields) => {
            return value === fields["#password"].elem.value;

           },
           errorMessage: "Passwords should match!"
        }
        
    ])
    
    .onSuccess((event)=>{
        document.getElementById("signup").submit(); 
        document.getElementById("tangazo").submit();
    })