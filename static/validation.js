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
    .addField("#email",[
        {
            rule: "required"
        },
        {
            rule:"email"
        }
    ])
    .addField("#password", [
        {
            rule: "required"
        },
        {
            rule: "password"

        }
    ])
    .addField("#pwd",[
        {
           validator:(value, fields) =>{

           },
           errorMessage: "Passwords should match",
        },
        
    ])
    .onSuccess((event)=>{
        document.getElementById("signup").submit(); 
    })