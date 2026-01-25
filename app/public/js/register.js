const roleSelect = document.getElementById("role");
const candidateFields = document.getElementById("candidate-fields");
const recruiterFields = document.getElementById("recruiter-fields");

roleSelect.addEventListener("change", () => {
  if (roleSelect.value == "1") {
    // Candidate
    candidateFields.style.display = "block";
    recruiterFields.style.display = "none";
  } else if (roleSelect.value == "2") {
    // Recruiter
    candidateFields.style.display = "none";
    recruiterFields.style.display = "block";
  } else {
    candidateFields.style.display = "none";
    recruiterFields.style.display = "none";
  }
});
