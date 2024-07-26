function displaySkill(skill) {
  const skillView = document.getElementById("skill-view");
  skillView.innerHTML = skill;
  skillView.style.display = skill ? "flex" : "none";
}

window.onload = () => {
  const heroData = [
    {
      id: 1,
      name: "Chou",
      img: "chou.jpg",
      description: "A talented fighter with a knight's heart.",
      type: "Fighter",
      fields: [
        { image: "sc1.png", field: "Skil 1" },
        { image: "sc2.png", field: "Skil 2" },
        { image: "sc3.png", field: "Skil 3" },
        { image: "sc4.png", field: "Skil 4" }
      ],
      skills: [
        { skill: "Only Fast", description: "Emits powerful beams of heat from his eyes." },
        { skill: "Jeet Kuno Do", description: "Forces those ensnared to tell the truth." },
        { skill: "Shunpo", description: "Forces those ensnared to tell the truth." },
        { skill: "The Way of Dragon", description: "Possesses incredible physical strength." }
      ]
    },
    {
      id: 2,
      name: "Gusion",
      img: "gs.jpg",
      description: "A rebellious noble prefers using blades over magic.",
      type: "Assasin",
      fields: [
        { image: "sg1.png", field: "Skil 1" },
        { image: "sg2.png", field: "Skil 2" },
        { image: "sg3.png", field: "Skil 3" },
        { image: "sg4.png", field: "Skil 4" }
      ],
      skills: [
        { skill: "Dagger Specialist", description: "Each skill cast adds a rune to Gusion's dagger (stacks up to 4 times). Each stack enhances Gusion's next Basic Attack Basic Attack to deal additional damage equal to 3% of the target's max HP and restore 50 (+25% Total Magic Power) HP to himsel." },
        { skill: "Sword Spike", description: "Gusion throws a dagger in the target direction, dealing 200 – 300 (+50% Total Magic Power) Magic Damage to the first enemy hit and marking them." },
        { skill: "Shadowblade Slaughter", description: "Gusion throws a volley of [five] daggers in the target direction, each dealing 110 – 210 (+50% Total Magic Power) Magic Damage to enemies hit and slowing them by 6% for 2 seconds (when hit by multiple daggers, the slow effect can stack up to 30%)." },
        { skill: "Incandescence", description: "Gusion dashes to the target location, resetting the cooldown of Sword Spike Sword Spike and Shadowblade Slaughter Shadowblade Slaughter. If Shadowblade Slaugther was cast once before the reset, Gusion can throw another five daggers on his next Shadowblade Slaughter, and recall a total of ten daggers afterward." }
      ]
    },
    {
      id: 3,
      name: "Valir",
      img: "peler.jpg",
      description: "Talented mage who controls the arcane flames.",
      type: "Mage",
      fields: [
        { image: "sv1.png", field: "Skil 1" },
        { image: "sv2.png", field: "Skil 2" },
        { image: "sv3.png", field: "Skil 3" },
        { image: "sv4.png", field: "Skil 4" }
      ],
      skills: [
        { skill: "Ashing", description: "Valir's skills apply a stack of Ablaze to enemies hit, dealing them Magic Damage equal to 0.6% of their Max HP per second for 4s." },
        { skill: "Burst Fireball", description: "Valir launches a fireball that explodes upon hitting the first target, dealing 235–410 (+80% Total Magic Power) Magic Damage and slowing them by 30% for 1s. The lingering flame on the ground will explode after 1s, dealing 118–205 (+40% Total Magic Power) Magic Damage." },
        { skill: "Searing Torrent", description: "Valir unleashes a torrent of flames in the target direction, dealing 200–300 (+60% Total Magic Power) Magic Damage to enemies hit and knocking them to the end of its path." },
        { skill: "Vengeance", description: "Valir removes all debuffs on himself and conjures 4 Vengeance Flames that last 9s. Each of his subsequent skillls consumes 1 Vengeance Flam to deal 30% extra base damage. The effects of both Burst Fireball and Searing Torrent can be enhanced." }
      ]
    },
    {
      id: 4,
      name: "Nana",
      img: "nana.jpg",
      description: "An Amazonian warrior princess with superhuman abilities.",
      type: "Mage",
      fields: [
        { image: "sn1.png", field: "Skil 1" },
        { image: "sn2.png", field: "Skil 2" },
        { image: "sn3.png", field: "Skil 3" },
        { image: "sn4.png", field: "Skil 4" }
      ],
      skills: [
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Bracelets of Submission", description: "Deflects projectiles and energy attacks." }
      ]
    },
    {
      id: 5,
      name: "Roger",
      img: "roger.jpg",
      description: "An Amazonian warrior princess with superhuman abilities.",
      type: "Fighter",
      fields: [
        { image: "sr1.png", field: "Skil 1" },
        { image: "sr2.png", field: "Skil 2" },
        { image: "sr3.png", field: "Skil 3" },
        { image: "sr4.png", field: "Skil 4" }
      ],
      skills: [
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Bracelets of Submission", description: "Deflects projectiles and energy attacks." }
      ]
    },
    {
      id: 6,
      name: "Vexana",
      img: "vexana.jpg",
      description: "An Amazonian warrior princess with superhuman abilities.",
      type: "Mage",
      fields: [
        { image: "svx.png", field: "Skil 1" },
        { image: "svx2.png", field: "Skil 2" },
        { image: "svx3.png", field: "Skil 3" },
        { image: "svx4.png", field: "Skil 4" }
      ],
      skills: [
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Bracelets of Submission", description: "Deflects projectiles and energy attacks." }
      ]
    },
    {
      id: 7,
      name: "Zilong",
      img: "zilong.jpg",
      description: "An Amazonian warrior princess with superhuman abilities.",
      type: "Fighter",
      fields: [
        { image: "sz1.png", field: "Skil 1" },
        { image: "sz2.png", field: "Skil 2" },
        { image: "sz3.png", field: "Skil 3" },
        { image: "sz4.png", field: "Skil 4" }
      ],
      skills: [
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Bracelets of Submission", description: "Deflects projectiles and energy attacks." }
      ]
    },
    {
      id: 8,
      name: "Hayabusa",
      img: "haya.jpg",
      description: "An Amazonian warrior princess with superhuman abilities.",
      type: "Assasin",
      fields: [
        { image: "sh1.png", field: "Skil 1" },
        { image: "sh2.png", field: "Skil 2" },
        { image: "sh3.png", field: "Skil 3" },
        { image: "sh4.png", field: "Skil 4" }
      ],
      skills: [
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Bracelets of Submission", description: "Deflects projectiles and energy attacks." }
      ]
    },
    {
      id: 9,
      name: "Alucard",
      img: "alu.jpg",
      description: "An Amazonian warrior princess with superhuman abilities.",
      type: "Fighter",
      fields: [
        { image: "sa1.png", field: "Skil 1" },
        { image: "sa2.png", field: "Skil 2" },
        { image: "sa3.png", field: "Skil 3" },
        { image: "sa4.png", field: "Skil 4" }
      ],
      skills: [
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Bracelets of Submission", description: "Deflects projectiles and energy attacks." }
      ]
    },
    {
      id: 10,
      name: "Kagura",
      img: "gura.jpeg",
      description: "An Amazonian warrior princess with superhuman abilities.",
      type: "Mage",
      fields: [
        { image: "sk1.png", field: "Skil 1" },
        { image: "sk2.png", field: "Skil 2" },
        { image: "sk3.png", field: "Skil 3" },
        { image: "sk4.png", field: "Skil 4" }
      ],
      skills: [
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Lasso of Truth", description: "Forces those ensnared to tell the truth." },
        { skill: "Bracelets of Submission", description: "Deflects projectiles and energy attacks." }
      ]
    }

  ];
  
  function displayHero(hero) {
    const heroView = document.getElementById("hero-view");
    heroView.innerHTML = `
              <img src="${hero.img}" alt="${hero.name}">
              <div class="stats">
                  <h2>${hero.name}</h2>
                  <p>${hero.description}</p>
                  <p><strong>Type :</strong> ${hero.type}</p>
                  <p class="hero_field">
                      <strong>Fields : </strong>
                        ${hero.fields
                        .map(
                          (field) =>
                             `<img class="hero_field_img" src="${field.image}" alt="${field.field}" title="${field.field}"> ${field.field}`
                        )
                        .join(" ")}
                  </p>
                  <p><strong>Skills : </strong> ${hero.skills
                    .map(
                      (skill) =>
                        `<div class="skill_badge" onmouseover="displaySkill('${skill.description}')" onmouseout="displaySkill('')">${skill.skill}</div>`
                    )
                    .join(" ")}</p>
              </div>
          `;
  }
  
  const heroList = document.getElementById("hero-list");
  heroData.forEach((hero) => {
    const heroName = document.createElement("div");
    heroName.classList.add("hero_name");
    heroName.innerHTML = hero.name;
    heroName.onclick = () => {
      displayHero(hero);
    };
    heroList.appendChild(heroName);
  });


  displayHero(heroData[0]);
};