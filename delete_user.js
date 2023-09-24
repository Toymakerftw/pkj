document.addEventListener("DOMContentLoaded", function () {
    // Function to create delete confirmation popup
    function confirmDelete(username) {
        return confirm(`Do you want to delete ${username}?`);
    }

    // Function to fetch user data and populate the table
    function loadUsers() {
        fetch("get_users.php")
        .then(response => response.json())
        .then(data => {
            const userTable = document.getElementById("user-table").getElementsByTagName('tbody')[0];
            userTable.innerHTML = '';

            data.forEach(user => {

                const row = userTable.insertRow();
                const usernameCell = row.insertCell(0);
                const aliasCell = row.insertCell(1);
                const actionCell = row.insertCell(2);

                usernameCell.textContent = user.username;
                aliasCell.textContent = user.alias;

                const deleteButton = document.createElement("button");
                deleteButton.textContent = "Delete";
                deleteButton.addEventListener("click", function () {
                    if (confirmDelete(user.username)) {
                        deleteUser(user.username);
                    }
                });

                actionCell.appendChild(deleteButton);
            });
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }

    // Function to delete a user
    function deleteUser(username) {
        fetch("delete_user.php", {
            method: "POST",
            body: JSON.stringify({ username }),
            headers: {
                "Content-Type": "application/json"
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(`User ${username} deleted successfully.`);
                loadUsers(); // Reload the user list after deletion
            } else {
                alert("Failed to delete the user.");
            }
        })
        .catch(error => {
            console.error("Error:", error);
        });
    }

    // Load user data when the page is loaded
    loadUsers();
});
