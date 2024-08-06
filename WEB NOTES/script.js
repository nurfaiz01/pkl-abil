let sectionHome = document.querySelector(".home");
let sectionLogin = document.querySelector(".login");
let sectionRegister = document.querySelector(".register");
let sectionEdit = document.querySelector(".edit");
let sectionAdd = document.querySelector(".add");

if (!localStorage.getItem("token")) {
    sectionLogin.style.display = "block";
} else {
    document.querySelector("#email").innerText = localStorage.getItem("email");
    sectionHome.style.display = "block";
    getNotes();
}

function switchDisplay(sectionName) {
    let sections = document.querySelectorAll("section");
    sections.forEach((s) => {
        s.style.display = "none";
    });
    document.querySelector(`.${sectionName}`).style.display = "block";
}

function logout() {
    localStorage.removeItem('token');
    switchDisplay('login');
}

async function getNotes() {
    await fetch("https://api.pkl-edusupe.my.id/notes", {
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
    })
        .then(async (response) => {
            let body = await response.json();
            if (!response.ok) {
                alert(body.message);
                localStorage.removeItem("token");
                switchDisplay('login');
                return;
            } else {
                return body;
            }
        })
        .then((resp) => {
            if (resp.success) {
                document.getElementById("notes").innerHTML = "";
                for (let note of resp.data) {
                    let noteElement = document.createElement("div");
                    noteElement.classList.add("note_list");
                    noteElement.innerHTML = `
                        <div class="head">
                            <h3>${note.title}</h3>
                            <div class="button_group">
                                <button onclick="deleteNote('${note.id}')">Delete</button>
                                <button onclick="showEditNote('${note.id}')">Edit</button>
                            </div>
                        </div>
                        <p>${note.content}</p>
                    `;
                    document.getElementById("notes").appendChild(noteElement);
                }
            }
        });
}

async function register(e) {
    e.preventDefault();
    let firstname = document.querySelector('input[name="rfirstname"]').value;
    let lastname = document.querySelector('input[name="rlastname"]').value;
    let email = document.querySelector('input[name="remail"]').value;
    let password = document.querySelector('input[name="rpassword"]').value;
    let cpassword = document.querySelector('input[name="rcpassword"]').value;

    await fetch("https://api.pkl-edusupe.my.id/signup", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            firstname,
            lastname,
            email,
            password,
            cpassword,
        }),
    })
        .then(async (response) => {
            let body = await response.json();
            if (!response.ok) {
                alert(body.message);
                return;
            } else {
                return body;
            }
        })
        .then((resp) => {
            if (resp?.success) {
                document.querySelector("#email").innerText = resp.data.email;
                localStorage.setItem("email", resp.data.email);
                localStorage.setItem("token", resp.data.token);
                switchDisplay('home');
                getNotes();
            }
        });
}

async function login(e) {
    e.preventDefault();
    let email = document.querySelector('input[name="email"]').value;
    let password = document.querySelector('input[name="password"]').value;
    await fetch("https://api.pkl-edusupe.my.id/login", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({
            email: email,
            password: password,
        }),
    })
        .then(async (response) => {
            let body = await response.json();
            if (!response.ok) {
                alert(body.message);
                return;
            } else {
                return body;
            }
        })
        .then((resp) => {
            if (resp?.data?.token) {
                document.querySelector("#email").innerText = resp.data.email;
                localStorage.setItem("email", resp.data.email);
                localStorage.setItem("token", resp.data.token);
                switchDisplay('home');
                getNotes();
            }
        });
}

async function addNote(e) {
    e.preventDefault();
    let title = document.getElementById("addTitle").value;
    let content = document.getElementById("addContent").value;
    await fetch("https://api.pkl-edusupe.my.id/notes", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify({
            title,
            content,
        }),
    })
        .then(async (response) => {
            let body = await response.json();
            if (!response.ok) {
                alert(body.message);
                return;
            } else {
                return body;
            }
        })
        .then((resp) => {
            if (resp.success) {
                switchDisplay('home');
                document.getElementById("notes").innerHTML = "";
                getNotes();
            }
        });

    document.getElementById("addTitle").value = "";
    document.getElementById("addContent").value = "";
}

async function showEditNote(id) {
    await fetch(`https://api.pkl-edusupe.my.id/notes/${id}`, {
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
    })
        .then(async (response) => {
            let body = await response.json();
            if (!response.ok) {
                alert(body.message);
                return;
            } else {
                return body;
            }
        })
        .then((resp) => {
            if (resp.success) {
                document.getElementById("editId").value = resp.data.id;
                document.getElementById("editTitle").value = resp.data.title;
                document.getElementById("editContent").value = resp.data.content;
                switchDisplay('edit');
            }
        });
}

async function editNote(e) {
    e.preventDefault();
    let id = document.getElementById("editId").value;
    let title = document.getElementById("editTitle").value;
    let content = document.getElementById("editContent").value;
    await fetch(`https://api.pkl-edusupe.my.id/notes/${id}`, {
        method: "PATCH",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
        body: JSON.stringify({
            title,
            content,
        }),
    })
        .then(async (response) => {
            let body = await response.json();
            if (!response.ok) {
                alert(body.message);
                return;
            } else {
                return body;
            }
        })
        .then((resp) => {
            if (resp.success) {
                switchDisplay('home');
                document.getElementById("notes").innerHTML = "";
                getNotes();
            }
        });

    document.getElementById("editTitle").value = "";
    document.getElementById("editContent").value = "";
}

async function deleteNote(id) {
    await fetch(`https://api.pkl-edusupe.my.id/notes/${id}`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            Authorization: `Bearer ${localStorage.getItem("token")}`,
        },
    })
        .then(async (response) => {
            let body = await response.json();
            if (!response.ok) {
                alert(body.message);
                return;
            } else {
                return body;
            }
        })
        .then((resp) => {
            if (resp.success) {
                document.getElementById("notes").innerHTML = "";
                getNotes();
            }
        });
}