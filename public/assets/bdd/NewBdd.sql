DROP
DATABASE IF EXISTS MATERNITY_BOOK;
CREATE
DATABASE MATERNITY_BOOK;
USE
MATERNITY_BOOK;
CREATE TABLE GROSSESSES
(
    ID_GROSSESSE       Int Auto_increment NOT NULL,
    ABONNEMENT         ENUM ('classic', 'Premium') DEFAULT 'classic',
    PREMIERE_GROSSESSE Boolean NOT NULL DEFAULT true,
    DATE_ACCOUCHEMENT  Date,
    DATE_CONCEPTION    Date,
    DUREE_MOY_CYCLE    Int,
    DATE_REGLES        Date,
    CHOIX_MATERNITE    Varchar(50),
    ARRIV_MATERNITE    Datetime,
    DEPART_MATERNITE   Datetime,
    PERIDURALE         Boolean,
    PERTE_EAUX         Varchar(30),
    TYPE_ACCOUCHEMENT  Varchar(30),
    LIVRE              Varchar(255),
    PARTAGE_COMPTE     Boolean          DEFAULT false,
    CONSTRAINT GROSSESSES_PK PRIMARY KEY (ID_GROSSESSE)
);
CREATE TABLE `USERS`
(
    ID_USER        Int Auto_increment NOT NULL,
    ROLE           ENUM ('admin', 'gratuit', 'abonne_p', 'abonne_sec') DEFAULT 'gratuit',
    PSEUDO         Varchar(30) DEFAULT 'Utilisateur' NOT NULL,
    PASSWORD       Varchar(50)                       NOT NULL,
    EMAIL           Varchar(50)                       NOT NULL,
    PRENOM         Varchar(30)                       NOT NULL,
    NOM            Varchar(30)                       NOT NULL,
    PHOTO_PROFIL   Varchar(255),
    APPLE          Varchar(50),
    GOOGLE         Varchar(50),
    FACEBOOK       Varchar(50),
    NEWSLETTER     Boolean     DEFAULT true          NOT NULL,
    DEM_COMMERCIAL Boolean     DEFAULT true          NOT NULL,
    ID_GROSSESSE   Int,
    ID_PARENT      Int,
    CONSTRAINT USERS_PK PRIMARY KEY (ID_USER),
    CONSTRAINT USERS_GROSSESSES_FK FOREIGN KEY (ID_GROSSESSE) REFERENCES GROSSESSES (ID_GROSSESSE),
    CONSTRAINT USERS_PARENTS_FK FOREIGN KEY (ID_PARENT) REFERENCES PARENTS (ID_PARENT)
);
CREATE TABLE PARENTS
(
    ID_PARENT        Int Auto_increment NOT NULL,
    LIEN_PARENTE     Varchar(20) NOT NULL DEFAULT 'Maman',
    PRENOM           Varchar(50),
    ENCEINTE         Boolean     NOT NULL DEFAULT true,
    CONJOINT         Boolean     NOT NULL DEFAULT false,
    POIDS_NAIS       Float,
    TAILLE_NAIS      Float,
    GROUPE_SANG      Varchar(3),
    PHOTO_BEBE       Varchar(255),
    PHOTO_ACTUEL     Varchar(255),
    DATE_NAIS        Datetime,
    DEPARTEMENT_NAIS Varchar(2),
    ID_GROSSESSE     Int         NOT NULL,
    CONSTRAINT PARENTS_PK PRIMARY KEY (ID_PARENT),
    CONSTRAINT PARENTS_GROSSESSES_FK FOREIGN KEY (ID_GROSSESSE) REFERENCES GROSSESSES (ID_GROSSESSE)
);
CREATE TABLE AVATARS
(
    ID_AVATAR    Int Auto_increment NOT NULL,
    CORPULENCE   Varchar(20) NOT NULL,
    COUL_PEAU    Varchar(20) NOT NULL,
    COUL_YEUX    Varchar(20) NOT NULL,
    COUL_CHEVEUX Varchar(20) NOT NULL,
    TYPE_CHEVEUX Varchar(20) NOT NULL,
    ACCESSOIRES  Varchar(20),
    BARBE        Varchar(20),
    ID_PARENT    Int         NOT NULL,
    CONSTRAINT AVATARS_PK PRIMARY KEY (ID_AVATAR),
    CONSTRAINT AVATARS_PARENTS_FK FOREIGN KEY (ID_PARENT) REFERENCES PARENTS (ID_PARENT),
    CONSTRAINT AVATARS_PARENTS_AK UNIQUE (ID_PARENT)
);
CREATE TABLE BEBES
(
    ID_BEBE      Int Auto_increment NOT NULL,
    SEXE         ENUM ('F','M'),
    PRENOM       Varchar(30),
    PRENOM_2     Varchar(30),
    PRENOM_3     Varchar(30),
    POIDS        Float,
    TAILLE       Float,
    DATE_NAIS    Datetime,
    ID_GROSSESSE Int NOT NULL,
    CONSTRAINT BEBES_PK PRIMARY KEY (ID_BEBE),
    CONSTRAINT BEBES_GROSSESSES_FK FOREIGN KEY (ID_GROSSESSE) REFERENCES GROSSESSES (ID_GROSSESSE)
);
CREATE TABLE ARTICLES_BLOG
(
    ID_ARTICLE Int Auto_increment NOT NULL,
    TITRE      Varchar(50) NOT NULL,
    BODY       Text        NOT NULL,
    DATE       Datetime DEFAULT CURRENT_TIMESTAMP,
    AUTEUR     Varchar(30) NOT NULL,
    PARTENAIRE Varchar(30) NOT NULL,
    CONSTRAINT ARTICLES_BLOG_PK PRIMARY KEY (ID_ARTICLE)
);
CREATE TABLE CATEGORIES
(
    ID_CATEG Int Auto_increment NOT NULL,
    NOM      Varchar(50) NOT NULL,
    CONSTRAINT CATEGORIES_PK PRIMARY KEY (ID_CATEG)
);
CREATE TABLE POSTS
(
    ID_POST  Int Auto_increment NOT NULL,
    TITRE    Varchar(50) NOT NULL,
    BODY     Text        NOT NULL,
    DATE     Datetime DEFAULT CURRENT_TIMESTAMP,
    ID_USER  Int         NOT NULL,
    ID_CATEG Int,
    CONSTRAINT POSTS_PK PRIMARY KEY (ID_POST),
    CONSTRAINT POSTS_USERS_FK FOREIGN KEY (ID_USER) REFERENCES USERS (ID_USER),
    CONSTRAINT POSTS_CATEGORIES_FK FOREIGN KEY (ID_CATEG) REFERENCES CATEGORIES (ID_CATEG)
);
CREATE TABLE CARTES_CADEAU
(
    ID_CARTE_CADEAU Int Auto_increment NOT NULL,
    NOM             Varchar(30) NOT NULL,
    MESSAGE         Varchar(255),
    CODE            Varchar(20) NOT NULL,
    DATE_VALIDITE   Date        NOT NULL,
    ID_GROSSESSE    Int         NOT NULL,
    CONSTRAINT CARTES_CADEAU_PK PRIMARY KEY (ID_CARTE_CADEAU),
    CONSTRAINT CARTES_CADEAU_GROSSESSES_FK FOREIGN KEY (ID_GROSSESSE) REFERENCES GROSSESSES (ID_GROSSESSE)
);
CREATE TABLE MEDICALS
(
    ID_MEDICAL   Int Auto_increment NOT NULL,
    TYPE         Varchar(40),
    NOM          Varchar(40) NOT NULL,
    ADRESSE      Varchar(80),
    CP           Varchar(5),
    VILLE        Varchar(40),
    TELEPHONE    Varchar(10),
    ID_GROSSESSE Int         NOT NULL,
    CONSTRAINT MEDICALS_PK PRIMARY KEY (ID_MEDICAL),
    CONSTRAINT MEDICALS_GROSSESSES_FK FOREIGN KEY (ID_GROSSESSE) REFERENCES GROSSESSES (ID_GROSSESSE)
);
CREATE TABLE RDV
(
    ID_RDV       Int Auto_increment NOT NULL,
    TITRE        Varchar(50) NOT NULL,
    BODY         Varchar(255),
    DATE         Datetime    NOT NULL,
    ID_GROSSESSE Int         NOT NULL,
    ID_MEDICAL   Int,
    CONSTRAINT RDV_PK PRIMARY KEY (ID_RDV),
    CONSTRAINT RDV_GROSSESSES_FK FOREIGN KEY (ID_GROSSESSE) REFERENCES GROSSESSE (ID_GROSSESSE),
    CONSTRAINT RDV_MEDICALS_FK FOREIGN KEY (ID_MEDICAL) REFERENCES MEDICAL (ID_MEDICAL)
);
CREATE TABLE SEMAINES
(
    NUM_SEMAINE Int         NOT NULL,
    FRUIT       Varchar(50) NOT NULL,
    TAILLE      Varchar(20) NOT NULL,
    POIDS       Varchar(20) NOT NULL,
    TITRE_PHOTO Varchar(50),
    TEXTE_PHOTO Varchar(50),
    CONSTRAINT SEMAINES_PK PRIMARY KEY (NUM_SEMAINE)
);
CREATE TABLE FORMULAIRES
(
    ID_FORMULAIRE Int Auto_increment NOT NULL,
    TYPE_QUESTION Varchar(20)           NOT NULL,
    INTITULE      Varchar(255)          NOT NULL,
    PRONOSTIC     Boolean DEFAULT false NOT NULL,
    NUM_SEMAINE   Int,
    CONSTRAINT FORMULAIRES_PK PRIMARY KEY (ID_FORMULAIRE),
    CONSTRAINT FORMULAIRES_SEMAINES_FK FOREIGN KEY (NUM_SEMAINE) REFERENCES SEMAINES (NUM_SEMAINE)
);
CREATE TABLE PHOTOS
(
    ID_PHOTO     Int Auto_increment NOT NULL,
    LIEN         Varchar(255) NOT NULL,
    INFO         Varchar(50)  NOT NULL,
    PERSONNE     Varchar(40)  NOT NULL,
    ID_GROSSESSE Int          NOT NULL,
    NUM_SEMAINE  Int          NOT NULL,
    CONSTRAINT PHOTOS_PK PRIMARY KEY (ID_PHOTO),
    CONSTRAINT PHOTOS_GROSSESSES_FK FOREIGN KEY (ID_GROSSESSE) REFERENCES GROSSESSES (ID_GROSSESSE),
    CONSTRAINT PHOTOS_SEMAINES_FK FOREIGN KEY (NUM_SEMAINE) REFERENCES SEMAINES (NUM_SEMAINE)
);
CREATE TABLE ADRESSES
(
    ID_ADRESSE   Int Auto_increment NOT NULL,
    NOM          Varchar(30) NOT NULL,
    PRENOM       Varchar(30) NOT NULL,
    ADRESSE      Varchar(80) NOT NULL,
    CP           Varchar(5)  NOT NULL,
    VILLE        Varchar(40) NOT NULL,
    ID_GROSSESSE Int         NOT NULL,
    CONSTRAINT ADRESSES_PK PRIMARY KEY (ID_ADRESSE),
    CONSTRAINT ADRESSES_GROSSESSES_FK FOREIGN KEY (ID_GROSSESSE) REFERENCES GROSSESSES (ID_GROSSESSE)
);
CREATE TABLE REPONSE
(
    ID_REPONSE    Int Auto_increment NOT NULL,
    REPONSE       Varchar(100) NOT NULL,
    PRENOM        Varchar(30)  NOT NULL,
    ID_FORMULAIRE Int          NOT NULL,
    CONSTRAINT REPONSES_PK PRIMARY KEY (ID_REPONSE),
    CONSTRAINT REPONSES_FORMULAIRES_FK FOREIGN KEY (ID_FORMULAIRE) REFERENCES FORMULAIRES (ID_FORMULAIRE)
);
CREATE TABLE MSG_PRIVE
(
    ID_MSG_PRIVE    Int Auto_increment NOT NULL,
    ID_EXPEDITEUR   Int          NOT NULL,
    ID_DESTINATAIRE Int          NOT NULL,
    DATE            Datetime DEFAULT CURRENT_TIMESTAMP,
    TITRE           Varchar(50),
    BODY            Varchar(255) NOT NULL,
    CONSTRAINT MSG_PRIVE_PK PRIMARY KEY (ID_MSG_PRIVE),
    CONSTRAINT MSG_PRIVE_USERS_FK FOREIGN KEY (ID_EXPEDITEUR) REFERENCES USERS (ID_USER),
    CONSTRAINT MSG_PRIVE_USER2_FK FOREIGN KEY (ID_DESTINATAIRE) REFERENCES USERS (ID_USER)
);
CREATE TABLE COMS_BLOG
(
    ID_COM_BLOG Int Auto_increment NOT NULL,
    TITRE       Varchar(50),
    BODY        Varchar(255)                       NOT NULL,
    DATE        Datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    ID_USER     Int                                NOT NULL,
    ID_ARTICLE  Int                                NOT NULL,
    CONSTRAINT COMS_BLOG_PK PRIMARY KEY (ID_COM_BLOG),
    CONSTRAINT COMS_BLOG_USERS_FK FOREIGN KEY (ID_USER) REFERENCES USERS (ID_USER),
    CONSTRAINT COMS_BLOG_ARTICLES_BLOG_FK FOREIGN KEY (ID_ARTICLE) REFERENCES ARTICLES_BLOG (ID_ARTICLE)
);
CREATE TABLE COMS_FORUM
(
    ID_COM_FORUM Int Auto_increment NOT NULL,
    TITRE        Varchar(50)                        NOT NULL,
    BODY         Varchar(255)                       NOT NULL,
    DATE         Datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
    ID_USER      Int                                NOT NULL,
    ID_POST      Int                                NOT NULL,
    CONSTRAINT COMS_FORUM_PK PRIMARY KEY (ID_COM_FORUM),
    CONSTRAINT COMS_FORUM_USERS_FK FOREIGN KEY (ID_USER) REFERENCES USERS (ID_USER),
    CONSTRAINT COMS_FORUM_POSTS_FK FOREIGN KEY (ID_POST) REFERENCES POSTS (ID_POST)
);
CREATE TABLE INVITES
(
    ID_INVITE     Int Auto_increment NOT NULL,
    LIEN          Varchar(100) NOT NULL,
    NOM           Varchar(30)  NOT NULL,
    DATE_VALIDITE Date         NOT NULL,
    ID_GROSSESSE  Int          NOT NULL,
    CONSTRAINT INVITES_PK PRIMARY KEY (ID_INVITE),
    CONSTRAINT INVITES_GROSSESSES_FK FOREIGN KEY (ID_GROSSESSE) REFERENCES GROSSESSES (ID_GROSSESSE)
);
CREATE TABLE SEMAINES_GROSSESSE
(
    NUM_SEMAINE  Int NOT NULL,
    ID_GROSSESSE Int NOT NULL,
    STATUT       ENUM ('vide','en_attente', 'valide'),
    CONSTRAINT SEMAINES_GROSSESSE_PK PRIMARY KEY (NUM_SEMAINE, ID_GROSSESSE),
    CONSTRAINT SEMAINES_GROSSESSE_SEMAINES_FK FOREIGN KEY (NUM_SEMAINE) REFERENCES SEMAINES (NUM_SEMAINE),
    CONSTRAINT SEMAINES_GROSSESSE_GROSSESSES_FK FOREIGN KEY (ID_GROSSESSE) REFERENCES GROSSESSES (ID_GROSSESSE)
);
INSERT INTO SEMAINES (NUM_SEMAINE, FRUIT, TAILLE, POIDS)
VALUES (1,
        'Poussière d\'étoiles',
            '0mm',
            '0'
        ),
        (
            2,
            'Poussière d\'étoiles',
        '0mm',
        '0'),
       (3,
        'Graine de pavot',
        '1,5mm',
        '0g'),
       (4,
        'Graine de pavot',
        '1,5mm',
        '0g'),
       (5,
        'Graine de sésame',
        '2mm',
        '0g'),
       (6,
        'Grain de riz',
        '5mm',
        '1g'),
       (7,
        'Myrtille',
        '9,5mm',
        '2g'),
       (8,
        'Framboise',
        '1,6cm',
        '5g'),
       (9,
        'Raisin',
        '2,3cm',
        '10g'),
       (10,
        'Datte',
        '3,1cm',
        '35g'),
       (11,
        'Figue',
        '4,1cm',
        '45g'),
       (12,
        'Prune',
        '5,4cm',
        '56g'),
       (13,
        'Kiwi',
        '6,6cm',
        '74g'),
       (14,
        'Pêche',
        '14,7cm',
        '93g'),
       (15,
        'Poire',
        '16,7cm',
        '116g'),
       (16,
        'Avocat',
        '18,5cm',
        '147g'),
       (17,
        'Orange Navel',
        '20,3cm',
        '181g'),
       (18,
        'Grenade',
        '22cm',
        '224g'),
       (19,
        'Pamplemousse',
        '24,1cm',
        '272g'),
       (20,
        'Mangue',
        '25,6cm',
        '331g'),
       (21,
        'Melon',
        '27,4cm',
        '400g'),
       (22,
        'Aubergine',
        '28-33cm',
        '453-680g'),
       (23,
        'Aubergine',
        '28-33cm',
        '453-680g'),
       (24,
        'Aubergine',
        '28-33cm',
        '453-680g'),
       (25,
        'Papaye',
        '33-38cm',
        '0,77-1,22kg'),
       (26,
        'Papaye',
        '33-38cm',
        '0,77-1,22kg'),
       (27,
        'Papaye',
        '33-38cm',
        '0,77-1,22kg'),
       (28,
        'Papaye',
        '33-38cm',
        '0,77-1,22kg'),
       (29,
        'Potiron',
        '38-43cm',
        '1,36-2kg'),
       (30,
        'Potimarron',
        '38-43cm',
        '1,36-2kg'),
       (31,
        'Potimarron',
        '38-43cm',
        '1,36-2kg'),
       (32,
        'Potimarron',
        '38-43cm',
        '1,36-2kg'),
       (33,
        'Melon Oriental',
        '43-48cm',
        '2-2,9kg'),
       (34,
        'Melon Oriental',
        '43-48cm',
        '2-2,9kg'),
       (35,
        'Melon Oriental',
        '43-48cm',
        '2-2,9kg'),
       (36,
        'Melon Oriental',
        '43-48cm',
        '2-2,9kg'),
       (37,
        'Pastèque',
        '48-52cm',
        '3-3,6kg'),
       (38,
        'Pastèque',
        '48-52cm',
        '3-3,6kg'),
       (39,
        'Pastèque',
        '48-52cm',
        '3-3,6kg'),
       (40,
        'Pastèque',
        '48-52cm',
        '3-3,6kg');
INSERT INTO GROSSESSES (DATE_REGLES, DATE_CONCEPTION)
VALUES (null,
        '2023-02-28'),
       (null,
        '2023-02-15'),
       (null,
        '2023-02-25'),
       ('2023-03-22',
        null),
       (null,
        '2023-03-22'),
       ('2023-04-15',
        null),
       (null,
        '2023-04-04'),
       ('2023-05-01',
        null),
       ('2023-05-05',
        null),
       (null,
        '2023-04-25');
INSERT INTO PARENTS (ID_PARENT, LIEN_PARENTE, POIDS_NAIS, TAILLE_NAIS, GROUPE_SANG, DATE_NAIS, DEPARTEMENT_NAIS,
                    ID_GROSSESSE)
VALUES (1,
        'Maman',
        3.68,
        53.44,
        'O+',
        '1980-01-02',
        95,
        1);

INSERT INTO `USERS` (EMAIL, PASSWORD, NOM, PRENOM, NEWSLETTER, DEM_COMMERCIAL, ROLE, ID_GROSSESSE, ID_PARENT)
VALUES ('marie.dupont@gmail.com',
        'motdepasse1',
        'Dupont',
        'Marie',
        true,
        false,
        'abonne_p',
        1,
        1);
INSERT INTO RDV (TITRE, BODY, DATE, ID_GROSSESSE)
VALUES ('Lorem ipsum dolor sit amet',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar pretium ligula.',
        '2023-07-05',
        1),
       ('Consectetur adipiscing elit',
        'Sed consequat massa ac nunc lobortis, sed posuere eros convallis. Fusce nec mauris in nisi cursus.',
        '2023-07-16',
        1),
       ('Sed do eiusmod tempor incididunt',
        'Nullam vitae sapien eu odio rhoncus pharetra. Donec eget mi sed diam fermentum accumsan.',
        '2023-07-29',
        1);


INSERT INTO `USERS` (EMAIL, PASSWORD, NOM, PRENOM, NEWSLETTER, DEM_COMMERCIAL, ROLE, ID_GROSSESSE)
VALUES ('sophie.martin@gmail.com',
        'motdepasse2',
        'Martin',
        'Sophie',
        true,
        true,
        'abonne_p',
        2),
       ('catherine.tremblay@gmail.com',
        'motdepasse3',
        'Tremblay',
        'Catherine',
        false,
        true,
        'abonne_p',
        3),
       ('isabelle.lefebvre@gmail.com',
        'motdepasse4',
        'Lefebvre',
        'Isabelle',
        true,
        false,
        'abonne_p',
        4),
       ('ana.garcia@gmail.com',
        'motdepasse5',
        'Garcia',
        'Anna',
        true,
        true,
        'abonne_p',
        5),
       ('ling.wang@gmail.com',
        'motdepasse6',
        'Wang',
        'Ling',
        true,
        true,
        'abonne_p',
        6),
       ('giulia.rossi@gmail.com',
        'motdepasse7',
        'Rossi',
        'Giulia',
        true,
        false,
        'abonne_p',
        7),
       ('aisha.patel@gmail.com',
        'motdepasse8',
        'Patel',
        'Aisha',
        false,
        true,
        'abonne_p',
        8),
       ('jihye.kim@gmail.com',
        'motdepasse9',
        'Kim',
        'Ji-hye',
        true,
        false,
        'abonne_p',
        9),
       ('mariana.silva@gmail.com',
        'motdepasse10',
        'Silva',
        'Mariana',
        true,
        true,
        'abonne_p',
        10),
       ('papa@papa.com',
        'papa',
        'papa',
        'papa',
        true,
        true,
        'abonne_sec',
        1);
INSERT INTO `USERS` (EMAIL, PASSWORD, NOM, PRENOM, ROLE)
VALUES ('admin@admin.fr',
        'admin',
        'admin',
        'admin',
        'admin'),
       ('oui@ouioui.com',
        'ouioui',
        'oui',
        'oui',
        'gratuit');

INSERT INTO CATEGORIES (NOM)
VALUES ('grossesse'),
       ('accouchement'),
       ('envies');

INSERT INTO POSTS (TITRE, BODY, ID_USER)
VALUES ('iekzfujnhiu',
        'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum vel, inventore eius sint quis, accusamus, molestiae explicabo quas placeat aspernatur ipsum voluptatem totam nobis atque quae maxime animi assumenda. Explicabo!
    Omnis repellat iusto reprehenderit commodi quae doloremque, ad itaque in vero consectetur rerum quod. Quasi quidem quisquam illo. Sunt nesciunt reprehenderit tempora ipsa minima blanditiis doloribus eum velit, perferendis quod?
    Totam magnam illum fugiat tenetur quam asperiores dicta, cum, corporis quo temporibus omnis iusto consequuntur ea esse animi vel fugit expedita illo quas autem perferendis? Rem non cum architecto iste!
    Ab vel architecto harum, nostrum libero beatae possimus, fugiat quam sapiente sed totam illo non. In nemo aperiam culpa itaque enim dolor error ducimus hic consectetur natus, sequi tempora vitae!
    Illo, ducimus facilis aliquid corrupti vel doloremque vero repellendus itaque accusamus fuga tenetur ea voluptatibus officiis laudantium quibusdam et error harum. Quod tempora placeat optio autem hic qui animi. Asperiores?
    Impedit minima fuga neque reiciendis dicta beatae omnis quia libero? Laborum hic esse soluta illo distinctio minus vel recusandae, perspiciatis quod dicta labore beatae, nemo ipsa sit minima non eligendi.
    Maxime tenetur a tempora excepturi placeat saepe omnis sequi cupiditate ut magni, expedita neque consectetur architecto ad, modi nulla at fugiat quo quisquam, voluptate sit ullam laudantium. Impedit, fuga ut.
    Dolorum quos quia deserunt cum illum atque est provident veniam blanditiis, suscipit commodi fuga culpa, consequatur ullam et aliquid quo, facere ad! Culpa dolore, aperiam velit a repudiandae in autem?
    Sed maxime blanditiis consequatur obcaecati vel dolores laborum magni dolorem ea beatae temporibus iure omnis voluptate labore suscipit ullam aut animi, quis sit repudiandae consectetur impedit. Ipsa dolorum quisquam deleniti.
    Neque deleniti laudantium quis quaerat mollitia non quidem. Reprehenderit mollitia delectus minima omnis ullam saepe at iusto eaque recusandae quia sint ex, et ut molestiae incidunt iste enim perspiciatis corporis.',
        1),
       ('Héouais',
        'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum vel, inventore eius sint quis, accusamus, molestiae explicabo quas placeat aspernatur ipsum voluptatem totam nobis atque quae maxime animi assumenda. Explicabo!
    Omnis repellat iusto reprehenderit commodi quae doloremque, ad itaque in vero consectetur rerum quod. Quasi quidem quisquam illo. Sunt nesciunt reprehenderit tempora ipsa minima blanditiis doloribus eum velit, perferendis quod?
    Totam magnam illum fugiat tenetur quam asperiores dicta, cum, corporis quo temporibus omnis iusto consequuntur ea esse animi vel fugit expedita illo quas autem perferendis? Rem non cum architecto iste!
    Ab vel architecto harum, nostrum libero beatae possimus, fugiat quam sapiente sed totam illo non. In nemo aperiam culpa itaque enim dolor error ducimus hic consectetur natus, sequi tempora vitae!
    Illo, ducimus facilis aliquid corrupti vel doloremque vero repellendus itaque accusamus fuga tenetur ea voluptatibus officiis laudantium quibusdam et error harum. Quod tempora placeat optio autem hic qui animi. Asperiores?
    Impedit minima fuga neque reiciendis dicta beatae omnis quia libero? Laborum hic esse soluta illo distinctio minus vel recusandae, perspiciatis quod dicta labore beatae, nemo ipsa sit minima non eligendi.
    Maxime tenetur a tempora excepturi placeat saepe omnis sequi cupiditate ut magni, expedita neque consectetur architecto ad, modi nulla at fugiat quo quisquam, voluptate sit ullam laudantium. Impedit, fuga ut.
    Dolorum quos quia deserunt cum illum atque est provident veniam blanditiis, suscipit commodi fuga culpa, consequatur ullam et aliquid quo, facere ad! Culpa dolore, aperiam velit a repudiandae in autem?
    Sed maxime blanditiis consequatur obcaecati vel dolores laborum magni dolorem ea beatae temporibus iure omnis voluptate labore suscipit ullam aut animi, quis sit repudiandae consectetur impedit. Ipsa dolorum quisquam deleniti.
    Neque deleniti laudantium quis quaerat mollitia non quidem. Reprehenderit mollitia delectus minima omnis ullam saepe at iusto eaque recusandae quia sint ex, et ut molestiae incidunt iste enim perspiciatis corporis.',
        1),
       ('Questionfezkjkzf,',
        'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum vel, inventore eius sint quis, accusamus, molestiae explicabo quas placeat aspernatur ipsum voluptatem totam nobis atque quae maxime animi assumenda. Explicabo!
    Omnis repellat iusto reprehenderit commodi quae doloremque, ad itaque in vero consectetur rerum quod. Quasi quidem quisquam illo. Sunt nesciunt reprehenderit tempora ipsa minima blanditiis doloribus eum velit, perferendis quod?
    Totam magnam illum fugiat tenetur quam asperiores dicta, cum, corporis quo temporibus omnis iusto consequuntur ea esse animi vel fugit expedita illo quas autem perferendis? Rem non cum architecto iste!
    Ab vel architecto harum, nostrum libero beatae possimus, fugiat quam sapiente sed totam illo non. In nemo aperiam culpa itaque enim dolor error ducimus hic consectetur natus, sequi tempora vitae!
    Illo, ducimus facilis aliquid corrupti vel doloremque vero repellendus itaque accusamus fuga tenetur ea voluptatibus officiis laudantium quibusdam et error harum. Quod tempora placeat optio autem hic qui animi. Asperiores?
    Impedit minima fuga neque reiciendis dicta beatae omnis quia libero? Laborum hic esse soluta illo distinctio minus vel recusandae, perspiciatis quod dicta labore beatae, nemo ipsa sit minima non eligendi.
    Maxime tenetur a tempora excepturi placeat saepe omnis sequi cupiditate ut magni, expedita neque consectetur architecto ad, modi nulla at fugiat quo quisquam, voluptate sit ullam laudantium. Impedit, fuga ut.
    Dolorum quos quia deserunt cum illum atque est provident veniam blanditiis, suscipit commodi fuga culpa, consequatur ullam et aliquid quo, facere ad! Culpa dolore, aperiam velit a repudiandae in autem?
    Sed maxime blanditiis consequatur obcaecati vel dolores laborum magni dolorem ea beatae temporibus iure omnis voluptate labore suscipit ullam aut animi, quis sit repudiandae consectetur impedit. Ipsa dolorum quisquam deleniti.
    Neque deleniti laudantium quis quaerat mollitia non quidem. Reprehenderit mollitia delectus minima omnis ullam saepe at iusto eaque recusandae quia sint ex, et ut molestiae incidunt iste enim perspiciatis corporis.',
        5),
       ('loremtsu',
        'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum vel, inventore eius sint quis, accusamus, molestiae explicabo quas placeat aspernatur ipsum voluptatem totam nobis atque quae maxime animi assumenda. Explicabo!
    Omnis repellat iusto reprehenderit commodi quae doloremque, ad itaque in vero consectetur rerum quod. Quasi quidem quisquam illo. Sunt nesciunt reprehenderit tempora ipsa minima blanditiis doloribus eum velit, perferendis quod?
    Totam magnam illum fugiat tenetur quam asperiores dicta, cum, corporis quo temporibus omnis iusto consequuntur ea esse animi vel fugit expedita illo quas autem perferendis? Rem non cum architecto iste!
    Ab vel architecto harum, nostrum libero beatae possimus, fugiat quam sapiente sed totam illo non. In nemo aperiam culpa itaque enim dolor error ducimus hic consectetur natus, sequi tempora vitae!
    Illo, ducimus facilis aliquid corrupti vel doloremque vero repellendus itaque accusamus fuga tenetur ea voluptatibus officiis laudantium quibusdam et error harum. Quod tempora placeat optio autem hic qui animi. Asperiores?
    Impedit minima fuga neque reiciendis dicta beatae omnis quia libero? Laborum hic esse soluta illo distinctio minus vel recusandae, perspiciatis quod dicta labore beatae, nemo ipsa sit minima non eligendi.
    Maxime tenetur a tempora excepturi placeat saepe omnis sequi cupiditate ut magni, expedita neque consectetur architecto ad, modi nulla at fugiat quo quisquam, voluptate sit ullam laudantium. Impedit, fuga ut.
    Dolorum quos quia deserunt cum illum atque est provident veniam blanditiis, suscipit commodi fuga culpa, consequatur ullam et aliquid quo, facere ad! Culpa dolore, aperiam velit a repudiandae in autem?
    Sed maxime blanditiis consequatur obcaecati vel dolores laborum magni dolorem ea beatae temporibus iure omnis voluptate labore suscipit ullam aut animi, quis sit repudiandae consectetur impedit. Ipsa dolorum quisquam deleniti.
    Neque deleniti laudantium quis quaerat mollitia non quidem. Reprehenderit mollitia delectus minima omnis ullam saepe at iusto eaque recusandae quia sint ex, et ut molestiae incidunt iste enim perspiciatis corporis.',
        3),
       ('zef',
        'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum vel, inventore eius sint quis, accusamus, molestiae explicabo quas placeat aspernatur ipsum voluptatem totam nobis atque quae maxime animi assumenda. Explicabo!
    Omnis repellat iusto reprehenderit commodi quae doloremque, ad itaque in vero consectetur rerum quod. Quasi quidem quisquam illo. Sunt nesciunt reprehenderit tempora ipsa minima blanditiis doloribus eum velit, perferendis quod?
    Totam magnam illum fugiat tenetur quam asperiores dicta, cum, corporis quo temporibus omnis iusto consequuntur ea esse animi vel fugit expedita illo quas autem perferendis? Rem non cum architecto iste!
    Ab vel architecto harum, nostrum libero beatae possimus, fugiat quam sapiente sed totam illo non. In nemo aperiam culpa itaque enim dolor error ducimus hic consectetur natus, sequi tempora vitae!
    Illo, ducimus facilis aliquid corrupti vel doloremque vero repellendus itaque accusamus fuga tenetur ea voluptatibus officiis laudantium quibusdam et error harum. Quod tempora placeat optio autem hic qui animi. Asperiores?
    Impedit minima fuga neque reiciendis dicta beatae omnis quia libero? Laborum hic esse soluta illo distinctio minus vel recusandae, perspiciatis quod dicta labore beatae, nemo ipsa sit minima non eligendi.
    Maxime tenetur a tempora excepturi placeat saepe omnis sequi cupiditate ut magni, expedita neque consectetur architecto ad, modi nulla at fugiat quo quisquam, voluptate sit ullam laudantium. Impedit, fuga ut.
    Dolorum quos quia deserunt cum illum atque est provident veniam blanditiis, suscipit commodi fuga culpa, consequatur ullam et aliquid quo, facere ad! Culpa dolore, aperiam velit a repudiandae in autem?
    Sed maxime blanditiis consequatur obcaecati vel dolores laborum magni dolorem ea beatae temporibus iure omnis voluptate labore suscipit ullam aut animi, quis sit repudiandae consectetur impedit. Ipsa dolorum quisquam deleniti.
    Neque deleniti laudantium quis quaerat mollitia non quidem. Reprehenderit mollitia delectus minima omnis ullam saepe at iusto eaque recusandae quia sint ex, et ut molestiae incidunt iste enim perspiciatis corporis.',
        2);
INSERT INTO COMS_FORUM (TITRE, BODY, ID_USER, ID_POST)
VALUES ('lorem',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et doloribus vero autem expedita nulla impedit ea ipsum dignissimos illo hic veniam, mollitia sed ut provident, non dolorem placeat eveniet porro.',
        1,
        1),
       ('grez',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et doloribus vero autem expedita nulla impedit ea ipsum dignissimos illo hic veniam, mollitia sed ut provident, non dolorem placeat eveniet porro.',
        1,
        1),
       ('azee',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et doloribus vero autem expedita nulla impedit ea ipsum dignissimos illo hic veniam, mollitia sed ut provident, non dolorem placeat eveniet porro.',
        3,
        2),
       ('nfrh',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et doloribus vero autem expedita nulla impedit ea ipsum dignissimos illo hic veniam, mollitia sed ut provident, non dolorem placeat eveniet porro.',
        2,
        5),
       ('pious',
        'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et doloribus vero autem expedita nulla impedit ea ipsum dignissimos illo hic veniam, mollitia sed ut provident, non dolorem placeat eveniet porro.',
        1,
        4);