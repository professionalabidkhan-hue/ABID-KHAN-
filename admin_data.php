<script>
    // --- MASTER DATA CACHE ---
    let masterStudentData = [];

    // --- PART 1: THE VISIONARY DATA STREAM ---
    async function loadStudentVault() {
        const tableBody = document.getElementById('student-table-body');
        const countDisplay = document.getElementById('stat-total'); // Links to your Vision Cards
        
        try {
            // STRIKING THE ORACLE BRIDGE
            const response = await fetch('https://your-freesql-domain.com/admin_data.php');
            masterStudentData = await response.json();

            renderTable(masterStudentData);
            
            // Update the Founder's Analytics Counter
            if(countDisplay) countDisplay.innerText = masterStudentData.length;
            
            console.log("SENTINEL: Vault Data Stream Complete. Total Members: " + masterStudentData.length);
        } catch (error) {
            console.error("Vision Error:", error);
            tableBody.innerHTML = '<tr><td colspan="7" style="color:red; text-align:center;">Sentinel Error: Data unreachable from Vault.</td></tr>';
        }
    }

    // --- PART 2: THE RENDERING ENGINE (MASTERY CODE) ---
    function renderTable(dataList) {
        const tableBody = document.getElementById('student-table-body');
        tableBody.innerHTML = ''; 

        dataList.forEach(student => {
            const row = `
                <tr>
                    <td>#${student.ID}</td>
                    <td><strong>${student.FULL_NAME}</strong></td>
                    <td>${student.EMAIL}</td>
                    <td><a href="https://wa.me/${student.WHATSAPP_NO}" target="_blank" style="color:green; text-decoration:none;">📞 ${student.WHATSAPP_NO}</a></td>
                    <td><span class="badge" style="background:#eee; padding:5px; border-radius:4px;">${student.DEPARTMENT}</span></td>
                    <td><span class="location-tag" style="background:#007BFF; color:white; padding:3px 8px; border-radius:12px; font-size:0.8em;">${student.LOCATION}</span></td>
                    <td>${new Date(student.CREATED_AT).toLocaleDateString('en-GB')}</td>
                </tr>
            `;
            tableBody.innerHTML += row;
        });
    }

    // --- PART 3: INSTANT SEARCH STRIKE (THE MASTER'S GRIP) ---
    function searchVault(query) {
        const filtered = masterStudentData.filter(student => 
            student.FULL_NAME.toLowerCase().includes(query.toLowerCase()) ||
            student.EMAIL.toLowerCase().includes(query.toLowerCase()) ||
            student.LOCATION.toLowerCase().includes(query.toLowerCase())
        );
        renderTable(filtered);
    }

    // --- PART 4: YOUR TREMENDOUS EXCEL EXPORT (CALIBRATED) ---
    function exportToExcel() {
        let table = document.querySelector("table");
        let rows = Array.from(table.rows);
        
        if (rows.length <= 1) {
            alert("SENTINEL: No data available in the Vault to export.");
            return;
        }

        let csvContent = rows.map(row => {
            let cols = Array.from(row.cells).map(cell => `"${cell.innerText.replace(/"/g, '""')}"`);
            return cols.join(",");
        }).join("\n");

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