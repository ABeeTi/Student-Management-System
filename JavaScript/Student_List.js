function renderStudents() {
    var tableBody = document.querySelector('#studentTable tbody');
    tableBody.innerHTML = '';

    students.forEach(function(student, index) {
      var row = `
        <tr>
          <td>${student.id}</td>
          <td>${student.name}</td>
          <td>${student.email}</td>
        </tr>
      `;
      tableBody.innerHTML += row;
    });
  }