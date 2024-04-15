#### Les Reajustements ####
    # au niveau des fonctions admin ou responsable de departement,
        on prends un membre et on lui attribue des rôles(adminVille, adminSection, adminGroupe, simple)
    # en consequence, un responsable est 

    # Ajout d'une table adhérent: um membre adhère à un ou plusieur fond et pour un fond peut adhérer plusieurs membres
        #adherent(#membre, #fond, dateAdhesion)

    # Si le montant payé est inferieur au montant à payer, c'est un payement en Tranche

# ################### Nuance /Membre/gerant/administrateur ###################
# un membre n'est pas forcement un utilisateur, c'est à dire qu'il n'as pas les autorisations necessaires pour se connecter au site. les utilisateurs sont les gerants(adminGroupe, AdminVille, AdminSecteur)
# un membre peut devenir un gerant dans la messure ou il est nommer par le crateur du groupe.
    #Membre(nom, prenom,tel, email dateAdhesion, groupe)
    #Gerant(nom, prenom, dateAdhesion, groupe)+(mot de passe)
    #Admin(nom, prenom, dateAdhesion, groupe)+(mot de passe)+(creer(groupe, ville), suprimer(groupe, ville))
    #groupe(auteur, label, gerant)
# une table des gerants(user) et une table des membres
# apres creation d'un groupe, on ajoute un membre et on peut nommer ce membre



### Quel est le but d'une Periode ?
    # difference entre periode et moment   
    # Dans une periode, on peut avoir plusieurs payement pour un fond



###################### gestion des urls  ######################
# un membre appartient à un groupe
    # http://127.0.0.1:8000/admin/id_groupe/register_membre -> ajout d'un membre à un groupe
