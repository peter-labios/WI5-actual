var questions = $(".questionclass");

questions.html(
    questions.find("label").sort(function(){
        return Math.round(Math.random())-0.5;
    })
);