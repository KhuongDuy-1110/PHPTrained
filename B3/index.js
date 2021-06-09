function validator(options) {
    
    var selectorRules = {};

    function validate(inputElement, rule) {
        var errorMessage;
        var errorElement = inputElement.parentElement.parentElement.querySelector(options.errorMessage);

        var rules = selectorRules[rule.selector];
        
        for(var i=0; i<rules.length; ++i){
            errorMessage = rules[i](inputElement.value);
            if(errorMessage) break;
        }

        if (errorMessage) {
            errorElement.innerText = errorMessage;
            inputElement.parentElement.parentElement.classList.add('invalid');
        }
        else {
            errorElement.innerText = '';
            inputElement.parentElement.parentElement.classList.remove('invalid');
        }
    }

    var formElement = document.querySelector(options.form);
    if (formElement) {
        options.rules.forEach(function (rule) {

            if(Array.isArray(selectorRules[rule.selector])){
                selectorRules[rule.selector].push(rule.test);
            }
            else{
                selectorRules[rule.selector] = [rule.test];  
            }
            //selectorRules[rule.selector] = rule.test;

            var inputElement = formElement.querySelector(rule.selector);
            if (inputElement) {
                inputElement.onblur = function () {
                    validate(inputElement,rule);
                }
                inputElement.oninput = function(){
                    var errorElement = inputElement.parentElement.parentElement.querySelector(options.errorMessage);
                    errorElement.innerText = '';
                    inputElement.parentElement.parentElement.classList.remove('invalid');
                }
            }
        });
        // console.log(selectorRules);
    }
}

validator.isRequired = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            return value.trim() ? undefined : message || 'Please enter this field'
        }
    }
}

validator.isEmail = function (selector, message) {
    return {
        selector: selector,
        test: function (value) {
            var regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return regex.test(value) ? undefined : message || 'Please enter your email ';
        }
    }
}

validator.minLength = function (selector, min, message) {
    return {
        selector: selector,
        test: function (value) {   
            return value.length >=min ? undefined : message || 'Please enter 6 symboys at least';
        }
    }
}

validator.isConfirmed = function(selector, get, message){
    return{
        selector: selector,
        test: function(value){
            return value === get() ? undefined : message || 'Wrong input';
        }
    }
}