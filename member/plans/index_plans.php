<?php
    require_once '../../include/config.php';
    require_once '../../include/session.php';
    require_once '../functionalities/view.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout Plan</title>
    <link rel="stylesheet" type="text/css" href="../css/index_plans.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <p>PERSONALIZE YOUR FITNESS JOURNEY</p>
        <div class="row">
            <div class="column-one">
                <form action="../functionalities/addPlans.php" method="post">
                    <select name="day" id="day" required>
                        <option value="NONE" selected>Select Workout Day</option>
                        <option value="MONDAY">Monday</option>
                        <option value="TUESDAY">Tuesday</option>
                        <option value="WEDNESDAY">Wednesday</option>
                        <option value="THURSDAY">Thursday</option>
                        <option value="FRIDAY">Friday</option>
                        <option value="SATURDAY">Saturday</option>
                        <option value="SUNDAY">Sunday</option>
                    </select>
                    <select name="workout_day" id="workout_day" onchange="updateWorkoutExercises()" required>
                        <option value="NONE" selected>Select Workout Program</option>
                        <option value="PULL DAY">Pull Day</option>
                        <option value="PUSH DAY">Push Day</option>
                        <option value="LEG DAY">Leg Day</option>
                        <option value="UPPER BODY DAY">Upper Body Day</option>
                        <option value="LOWER BODY DAY">Lower Body Day</option>
                        <option value="FULL BODY WORKOUT">Full Body Workout</option>
                        <option value="CORE DAY">Core Day</option>
                        <option value="CARDIO DAY">Cardio Day</option>
                    </select>

                    <div id="exercise-options" class="exercise-options">
                    </div>
            </div>
                        <div class="column-two">
                            <div id="selected-exercises">
                                <p>Selected Exercises:</p>
                                <ul id="exercises-list">
                            </div>
                            <div class="diet-plan">
                                <textarea type="text" name="diet_plan" placeholder="Input Diet Plan..." required></textarea>
                                <button class="create-button">CREAT PLAN</button>
                            </div>
                        </div>
                        
                    
                </form>

                <div class="back-Button">
                    <a href="plans.php">Back</a>
                </div>
                <div class="success-popup">
                    <div>
                        <?php success_plans(); ?>
                    </div>
                    
            </div>
        </div>
        
    </div>

    <script>
        function updateWorkoutExercises() {
            const workoutDay = document.getElementById("workout_day").value;
            const exerciseOptionsDiv = document.getElementById("exercise-options");
            exerciseOptionsDiv.innerHTML = ""; 

            let exercises = [];

            if (workoutDay === "PULL DAY") {
                exercises = ["Pull-ups", "Barbell Rows", "Lat Pulldown", "Deadlifts"];
            } else if (workoutDay === "PUSH DAY") {
                exercises = ["Push-ups", "Bench Press", "Overhead Press", "Dips"];
            } else if (workoutDay === "LEG DAY") {
                exercises = ["Squats", "Deadlifts", "Leg Press", "Lunges", "Bulgarian Split Squat", "Step-Ups",
                    "Leg Extensions", "Leg Curls", "Glute Bridge", "Lunges", "Hip Thrusts", "Calf Raises",
                    "Smith Machine Squats", "Sumo Deadlift", "Hack Squat", "Farmer's Walk (with focus on legs)"];
            } else if (workoutDay === "UPPER BODY DAY") {
                exercises = ["Bicep Curls", "Tricep Dips", "Chest Fly", "Shoulder Press"];
            } else if (workoutDay === "LOWER BODY DAY") {
                exercises = ["Squats", "Leg Press", "Calf Raises", "Hamstring Curls"];
            } else if (workoutDay === "FULL BODY WORKOUT") {
                exercises = ["Burpees", "Deadlifts", "Push-ups", "Mountain Climbers"];
            } else if (workoutDay === "CORE DAY") {
                exercises = ["Planks", "Sit-ups", "Russian Twists", "Leg Raises"];
            } else if (workoutDay === "CARDIO DAY") {
                exercises = ["Running", "Cycling", "Jump Rope", "Rowing"];
            } else {
                exercises = []; 
            }

            exercises.forEach(function(exercise) {
                let checkboxLabel = document.createElement("label");
                let checkbox = document.createElement("input");
                checkbox.type = "checkbox";
                checkbox.value = exercise;
                checkbox.name = "exercise[]";  
                checkbox.onchange = displaySelectedExercises;
                checkboxLabel.appendChild(checkbox);
                checkboxLabel.appendChild(document.createTextNode(exercise));
                exerciseOptionsDiv.appendChild(checkboxLabel);
                exerciseOptionsDiv.appendChild(document.createElement("br"));
            });
        }

        function displaySelectedExercises() {
            const checkboxes = document.querySelectorAll('input[name="exercise[]"]:checked');
            const selectedExercises = Array.from(checkboxes).map(cb => cb.value);
            const exercisesList = document.getElementById("exercises-list");

            exercisesList.innerHTML = ""; 

            selectedExercises.forEach(function(exercise) {
                let listItem = document.createElement("li");
                listItem.textContent = exercise;
                exercisesList.appendChild(listItem);
            });
        }

        window.onload = updateWorkoutExercises;
    </script>
</body>
</html>
