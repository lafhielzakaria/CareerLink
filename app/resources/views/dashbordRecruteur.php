<!DOCTYPE html>
<html lang="en">
      <?php
        use app\Controllers\JobOffreController;
              $controller = new JobOffreController ();
             $joboffers =  $controller->getAllJoboffers();
             var_dump ($joboffers);
             //jib skills

      ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recruiter Dashboard - CareerLink</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 30px;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #667eea;
            font-size: 28px;
            margin-bottom: 5px;
        }

        .header p {
            color: #999;
            font-size: 16px;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 30px;
        }

        .card h2 {
            color: #333;
            font-size: 20px;
            margin-bottom: 20px;
            border-bottom: 2px solid #667eea;
            padding-bottom: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 5px;
            font-size: 14px;
            transition: border-color 0.3s;
            font-family: inherit;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .btn {
            padding: 12px 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .navbar {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 15px 30px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar .logo {
            color: white;
            font-size: 24px;
            font-weight: bold;
        }

        .navbar .user-info {
            color: white;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .navbar .btn {
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            padding: 8px 16px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <nav class="navbar">
            <div class="logo">CareerLink</div>
            <form action="joboffreController" method="post">
                <button class="btn">Logout</button>
                <input hidden  name = "logout">
            </form>
        </nav>
        
        <div class="header">
            <h1>Recruiter Dashboard</h1>
            <p>Manage your job offers and track applications</p>
        </div>
        
        <div class="dashboard-grid">
            <div class="card">
                <h2>Create New Job Offer</h2>
                <form action="joboffreController" method="post" id = "offreForm">
                    <div class="form-group">
                        <label for="jobTitle">Job Title</label>
                        <input type="text" id="jobTitle" name="jobTitle" placeholder="Enter job title">
                    </div>
                    
                    <div class="form-group">
                        <label for="offreDescription">Job Description</label>
                        <textarea id="offreDescription" name="offreDescription" placeholder="Enter job description"></textarea>
                    </div>
                    
                    <div class="form-group">
                    </div>
                    
                    <div class="form-group">
                        <label for="skills">Skills</label>
                        <select id="skills" name="skillSelect">
                            <option value="">Select skill</option>
                            <option value="1">PHP</option>
                            <option value="2">CSS</option>
                            <option value="3">JavaScript</option>
                        </select>
                        <div id="selectedSkills" style="margin-top: 10px;"></div>
                        <input type="hidden" name="skills" id="skillsArray" value="">
                    </div>
                    
                    <div class="form-group">
                        <label for="salary">Salary Range</label>
                        <input type="number" id="salary" name="salary" placeholder="Enter the salary range">
                    </div>
                    
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" placeholder="Enter job location">
                    </div>
                    
                    <button type="submit" class="btn">Create Job Offer</button>
                </form>
            </div>
        </div>
    </div>
  
    <script>
           const Validate_Rules = {
    jobTitle: {
        regex: /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]{3,}$/,
        errormessage: "invilade job title name"
    },
    offreDescription: {
                regex: /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]{3,}$/,
            errormessage: "invilade joboffredescription"
    }, 
    salary: {
        regex:  /^\d+$/,
        errormessage: "invilade salary range"
    },
    location: {
        regex: /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]{3,}$/,
        errormessage: "invilade location"
    },
    
};
        let selectedSkills = [];
          
        document.getElementById('skills').addEventListener('change', function() {
            const skillId = this.value;
            const skillText = this.options[this.selectedIndex].text;
            
            if (skillId && !selectedSkills.includes(skillId)) {
                selectedSkills.push(skillId);
                
                const skillDiv = document.createElement('div');
                skillDiv.innerHTML = `${skillText} <button type="button" onclick="removeSkill('${skillId}', this)">Remove</button>`;
                skillDiv.style.cssText = 'padding: 5px; margin: 2px; background: #f0f0f0; display: inline-block;';
                document.getElementById('selectedSkills').appendChild(skillDiv);
                document.getElementById('skillsArray').value = selectedSkills.join(',');
            }
            
            this.value = '';
        });
         
        function removeSkill(skillId, button) {
            selectedSkills = selectedSkills.filter(id => id !== skillId);
            button.parentElement.remove();
            document.getElementById('skillsArray').value = selectedSkills.join(',');
        }
    </script>
</body>
</html>