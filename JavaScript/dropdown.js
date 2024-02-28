
function create_db(){
    var create_db = document.getElementById("Create_db");
    create_db.style.display = "block";

    var rename_db = document.getElementById("Rename_db");
    rename_db.style.display = "none";

    var delete_db = document.getElementById("Delete_db");
    delete_db.style.display = "none";
}

function rename_db(){
    var create_db = document.getElementById("Create_db");
    create_db.style.display = "none";

    var rename_db = document.getElementById("Rename_db");
    rename_db.style.display = "block";

    var delete_db = document.getElementById("Delete_db");
    delete_db.style.display = "none";
}

function delete_db(){
    var create_db = document.getElementById("Create_db");
    create_db.style.display = "none";

    var rename_db = document.getElementById("Rename_db");
    rename_db.style.display = "none";

    var delete_db = document.getElementById("Delete_db");
    delete_db.style.display = "block";
}