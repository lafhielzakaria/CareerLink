<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - CareerLink</title>

    <link rel="stylesheet" href="./app/public/css/register.css">
</head>

<body>
    <div class="container">
        <div class="register-card">
            <div class="logo">
                <h1>CareerLink</h1>
                <p>Create Your Account</p>
            </div>



            <form action="register" method="POST">
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="last_name" placeholder="Last Name" required>
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>

                <select id="role" name="role_id" required>
                    <option value="">Choisir un rôle</option>
                    <option value="1">Candidate</option>
                    <option value="2">Recruiter</option>
                </select>

                <div id="candidate-fields" style="display:none;">
                    <input type="text" name="skills" placeholder="Compétences">
                    <input type="number" name="salary_expectation" placeholder="Salaire souhaité">
                </div>

                <div id="recruiter-fields" style="display:none;">
                    <input type="text" name="company_name" placeholder="Nom de l’entreprise">
                </div>

                <button type="submit">Register</button>
            </form>

            <div class="login-link">
                Already have an account? <a href="formLogin">Login here</a>
            </div>
        </div>
    </div>

    <script src="./app/public/js/register.js"></script>
</body>

</html>