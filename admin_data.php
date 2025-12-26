<script>
    // --- PART 1: THE VISIONARY DATA STREAM ---
    async function loadStudentVault() {
        const tableBody = document.getElementById('student-table-body');
        
        try {
            // STRIKING THE ORACLE BRIDGE
            const response = await fetch('https://your-freesql-domain.com/admin_data.php');
            const data = await response.json();

            tableBody.innerHTML = ''; // Clear the Gateway

            data.forEach(student => {
                const row = `
                    <tr>
                        <td>${student.ID}</td>
                        <td><strong>${student.FULL_NAME}</strong></td>
                        <td>${student.EMAIL}</td>
                        <td>${student.WHATSAPP_NO}</td>
                        <td>${student.DEPARTMENT}</td>
                        <td><span class="location-tag">${student.LOCATION}</span></td>
                        <td>${new Date(student.CREATED_AT).toLocaleDateString()}</td>
                    </tr>
                `;
                tableBody.innerHTML += row;
            });
            console.log("SENTINEL: Vault Data Stream Complete.");
        } catch (error) {
            console.error("Vision Error:", error);
            tableBody.innerHTML = '<tr><td colspan="7">Sentinel Error: Data unreachable.</td></tr>';
        }
    }

    // --- PART 2: YOUR TREMENDOUS EXCEL EXPORT (CALIBRATED) ---
    function exportToExcel() {
        let table = document.querySelector("table");
        let rows = Array.from(table.rows);
        
        if (rows.length <= 1) {
            alert("SENTINEL: No data available in the Vault to export.");
            return;
        }

        // Map data to CSV format with Excel-friendly quoting
        let csvContent = rows.map(row => {
            let cols = Array.from(row.cells).map(cell => `"${cell.innerText.replace(/"/g, '""')}"`);
            return cols.join(",");
        }).join("\n");

        // THE DOWNLOAD STRIKE
        let blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        let link = document.createElement("a");
        let url = URL.createObjectURL(blob);
        
        link.setAttribute("href", url);
        link.setAttribute("download", "Abid_Hub_Master_List_" + new Date().toISOString().split('T')[0] + ".csv");
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    // INITIALIZE ON LOAD
    window.onload = loadStudentVault;
</script>