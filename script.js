function submitted()
{
    alert("Form is Submitted.");
    location.replace("index.php");
}
function notsubmitted()
{
    alert("Form is not submitted.");
    location.replace("signup.php");
}
function logged()
{
    alert("Welcome User.");
    location.replace("index.php");
}
function notlogged()
{
    alert("Sorry you are not a user Sign up here.");
    location.replace("signup.php");
}
function adminsubmitted()
{
    alert("Welcome Prateek Pathak");
    location.replace("adminsection.php");
}
function adminnotsubmitted()
{
    alert("Sorry you are not registered as a admin try again");
    location.replace("admin.php");
}
function adminunfilled()
{
    alert("Please enter full details.");
    location.replace("admin.php");
}
function loginunfilled()
{
    alert("Please enter full details.");
    location.replace("login.php");
}
function signupunfilled()
{
    alert("Please enter full details.");
    location.replace("signup.php");
}
function logout()
{
    alert("You have been logged out.");
    location.replace("index.php");
}
function adminblock()
{
    alert("Access Denied");
    location.replace("index.php");
}
function queslogged()
{
    alert("Please login to ask question");
    location.replace("login.php");
}
function quesempty()
{
    alert("Please enter question");
    location.replace("questions.php");
}
function quesubmit()
{
    alert("Question is submitted");
    location.replace("index.php");
}
function unque()
{
    alert("Question not submitted try again");
    location.replace("questions.php");
}
function anslog()
{
    alert("Please login to give answers");
    location.replace("login.php");
}
function ansempty()
{
    alert("Please enter answer");
    location.replace("answers.php");
}
function anssubmit()
{
    alert("Answer is submitted");
    location.replace("index.php");
}
function unans()
{
    alert("Answer not submitted try again");
    location.replace("answers.php");
}
function suggunfill()
{
    alert("Please enter full details.");
    location.replace("about.php");
}
function aboutsubmit()
{
    alert("Suggestions are submitted");
    location.replace("index.php");
}
function notabout()
{
    alert("Not submitted");
    location.replace("about.php");
}
function delsug()
{
    alert("Suggestion deleted");
    location.replace("adminsection.php");
}
function undelsug()
{
    alert("Suggestion can't be deletd.");
    location.replace("adminsection.php");
}
function deluse()
{
    alert("User is deleted");
    location.replace("musers.php");

}
function undelsue()
{
    alert("User cannot be deleted");
    location.replace("musers.php");
}
function delq()
{
    alert("Question deleted");
    location.replace("eques.php");
}
function undelq()
{
    alert("Question can't be deleted");
    location.replace("eques.php");
}
function dela()
{
    alert("Answer deleted");
    location.replace("eans.php");
}
function undela()
{
    alert("Answer can't be deleted");
    location.replace("eans.php");
}