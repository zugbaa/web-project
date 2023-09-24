const validation = new JustValidate("#signup");

validation
    .addField("#ime", [
        {
            rule: "required"
        }
])
    .addField("#terms", [
        {
            rule: "required"
        }
    ])
    .onSuccess((event) => {
        document.getElementById("signup").submit();
    });
    
    
    
    
    
    
    
    
    
    
    
    
    