INSERT INTO grossesse (
    DATE_REGLES, DATE_CONCEPTION
)
VALUES(
    null,
    '2023-02-28'
),
(
    null,
    '2023-02-15'
),
(
    null,
    '2023-02-25'
),
(
    '2023-03-22',
    null
),
(
    null,
    '2023-03-22'
),
(
    '2023-04-15',
    null
),
(
    null,
    '2023-04-04'
),
(
    '2023-05-01',
    null
),
(
    '2023-05-05',
    null
),
(
    null,
    '2023-04-25'
);
INSERT INTO `user` (
    MAIL, PASSWORD, NOM, PRENOM, NEWSLETTER, DEM_COMMERCIAL, ROLE, ID_GROSSESSE)
VALUES(
    'marie.dupont@gmail.com',
    'motdepasse1',
    'Dupont',
    'Marie',
    true,
    false,
    'abonne_p',
    1 
),
(
    'sophie.martin@gmail.com',
    'motdepasse2',
    'Martin',
    'Sophie',
    true,
    true,
    'abonne_p',
    2  
),
(
    'catherine.tremblay@gmail.com',
    'motdepasse3',
    'Tremblay',
    'Catherine',
    false,
    true,
    'abonne_p',
    3 
),
(
    'isabelle.lefebvre@gmail.com',
    'motdepasse4',
    'Lefebvre',
    'Isabelle',
    true,
    false,
    'abonne_p',
    4  
),
(
    'ana.garcia@gmail.com',
    'motdepasse5',
    'Garcia',
    'Anna',
    true,
    true,
    'abonne_p',
    5 
),
(
    'ling.wang@gmail.com',
    'motdepasse6',
    'Wang',
    'Ling',
    true,
    true,
    'abonne_p',
    6  
),
(
    'giulia.rossi@gmail.com',
    'motdepasse7',
    'Rossi',
    'Giulia',
    true,
    false,
    'abonne_p',
    7  
),
(
    'aisha.patel@gmail.com',
    'motdepasse8',
    'Patel',
    'Aisha',
    false,
    true,
    'abonne_p',
    8 
),
(
    'jihye.kim@gmail.com',
    'motdepasse9',
    'Kim',
    'Ji-hye',
    true,
    false,
    'abonne_p',
    9  
),
(
    'mariana.silva@gmail.com',
    'motdepasse10',
    'Silva',
    'Mariana',
    true,
    true,
    'abonne_p',
    10 
),(
    'papa@papa.com',
    'papa',
    'papa',
    'papa',
    true ,
    true , 
    'abonne_sec' ,
    1
);
INSERT INTO `user` (
    MAIL, PASSWORD, NOM, PRENOM, ROLE
)
VALUES(
    'admin@admin.fr',
    'admin',
    'admin',
    'admin', 
    'admin' 
),
(
    'oui@ouioui.com',
    'ouioui',
    'oui',
    'oui',
    'gratuit'
);

INSERT INTO CATEG_FORUM (
    NOM
)
VALUES(
          'grossesse'),
      ('accouchement'),
      ('envies');

INSERT INTO post_forum (
    TITRE, BODY, ID_USER
)
VALUES(
    'iekzfujnhiu',
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
    1
),
(
    'Héouais',
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
    1
),
(
    'Questionfezkjkzf,',
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
    5
),
(
    'loremtsu',
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
    3
),
(
    'zef',
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
    2
);
INSERT INTO com_forum (
    TITRE, BODY, ID_USER, ID_POST
)
VALUES(
    'lorem',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et doloribus vero autem expedita nulla impedit ea ipsum dignissimos illo hic veniam, mollitia sed ut provident, non dolorem placeat eveniet porro.',
    1,
    1 
),
(
    'grez',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et doloribus vero autem expedita nulla impedit ea ipsum dignissimos illo hic veniam, mollitia sed ut provident, non dolorem placeat eveniet porro.',
    1,
    1 
),
(
    'azee',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et doloribus vero autem expedita nulla impedit ea ipsum dignissimos illo hic veniam, mollitia sed ut provident, non dolorem placeat eveniet porro.',
    3,
    2 
),
(
    'nfrh',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et doloribus vero autem expedita nulla impedit ea ipsum dignissimos illo hic veniam, mollitia sed ut provident, non dolorem placeat eveniet porro.',
    2,
    5
),
(
    'pious',
    'Lorem ipsum dolor sit amet consectetur adipisicing elit. Et doloribus vero autem expedita nulla impedit ea ipsum dignissimos illo hic veniam, mollitia sed ut provident, non dolorem placeat eveniet porro.',
    1,
    4 
);

