var app = app || {};

// maak hier een app.randomStudentView object
// dit object is je koppeling met je html om random studenten te kunnen laten zien
// als je op shuffle klikt, dan moet dit script dit afvangen en actie ondernemen
// om bij de model iets op te halen

app.randomStudentsView = {

    // onze init functie voeren we 1x uit
    // deze functie initialiseert alles
    init: function(){

        // Grab the template script from the dom
        var templateSrc = document.querySelector("#students-template").innerHTML;

        this.template = Handlebars.compile(templateSrc);
        this.container = document.querySelector(".container");

        // deze data moet UIT de view gehaald worden
        // jullie hebben je data in studentsModel.js staan!
        var testData = {
            students: [
                {firstName:"Gianni", id:"1"},
                {firstName:"Luuk", id:"2"},
                {firstName:"Joris", id:"3"},
                {firstName:"Anton", id:"4"}
            ]
        };

        // Transform the HTML template into a 'real' template
        this.render(testData);

        var exampleLesson5 = document.querySelector("#btn1");
        this.container.addEventListener('click', this.studentsClicked.bind(this));

    },

    render:function(data){
        this.container.innerHTML = this.template(data);
    },
    studentsClicked: function(e) {
        var targetRow = e.target;
        console.log(targetRow.dataset.id);
    }

}