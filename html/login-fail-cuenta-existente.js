const signUpButton=document.getElementById('signUpButton');
const signUpForm=document.getElementById('signUp');

signUpButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})