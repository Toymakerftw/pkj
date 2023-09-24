document.addEventListener("DOMContentLoaded", function () {
    // Function to fetch and populate the Associate dropdown
    function loadAssociates() {
        const associateDropdown = document.getElementById("associate");

        fetch("get_associates.php")
        .then(response => response.json())
        .then(data => {
            data.forEach(associate => {
                const option = document.createElement("option");
                option.value = associate.username;
                option.textContent = associate.alias;
                associateDropdown.appendChild(option);
            });
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }

    // Load Associates into the dropdown when the page is loaded
    loadAssociates();

    // Handle the RFQ assignment form submission
    const assignRFQForm = document.getElementById("assign-rfq-form");

    assignRFQForm.addEventListener("submit", function (e) {
        e.preventDefault();

        const formData = new FormData(assignRFQForm);

        fetch("assign_rfqs_process.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("RFQ assigned successfully.");
                assignRFQForm.reset();
            } else {
                alert("Failed to assign RFQ.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
});
