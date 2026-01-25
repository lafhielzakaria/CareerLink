 let selectedSkills = [];
   const Validate_Rules = {
    offreTitle: {
        regex: /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]{3,}$/,
        errormessage: "invilade job title name"
    },
    jobOfrreDesciption: {
                regex: /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]{3,}$/,
            errormessage: "invilade joboffredescription"
    },
    worker_role: {
        errormessage: "invilade worker role"
    },
    salaryRange: {
        regex:  /^\d+$/,
        errormessage: "invilade salary range"
    },
    location: {
        regex: /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]{3,}$/,
        errormessage: "invilade location"
    },
    
};
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
