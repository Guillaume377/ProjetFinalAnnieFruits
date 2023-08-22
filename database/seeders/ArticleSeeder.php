<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Article::create([
            'nom' => 'Ail',
            'description_detaillee' => "<h5>Conseils de conservation et préparation</h5><br> 
            L’ail sec se conserve à température ambiante au sec et à l’abri de la lumière. L’ail frais se conserve quelques jours au réfrigérateur. Il relève à merveille les poêlées de légumes, les pâtes, sauces et soupes.
            Frottez votre ail sur du pain ou dans le fond d’un plat pour un léger parfum !.",
            'image' => 'ail.jpg',
            'prix' => 20,
            'type_prix' => 'kilo',
            'stock' => 10,
            'note' => 4,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Ananas',
            'description_detaillee' => "<h5>L'ananas Victoria, le fruit roi de l'exotisme.</h5><br> Son goût frais et sucré évoque les îles, son parfum embaume notre cuisine de vacances. 
            On adore l’Ananas Victoria qui débarque en hiver dans nos paniers pour apporter un peu de soleil à nos recettes et 
            à nos desserts. L’ananas Victoria est un voyage tropical à lui tout seul.",
            'image' => 'ananas.jpg',
            'prix' => 4,
            'type_prix' => 'pièce',
            'stock' => 20,
            'note' => 4.5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Artichaut',
            'description_detaillee' => "<h5>Conseils de conservation et préparation</h5><br> 
            L’artichaut se conserve cru, pendant quelques jours au réfrigérateur. Laissez-lui sa tige afin de le protéger de l’oxydation. Une fois cuit, il ne faut pas attendre plus d’une journée avant de le consommer.
            L’artichaut se cuit à la vapeur ou à l’eau, se présente froid ou tiède et accompagné d’une sauce vinaigrette. Le fond ou le cœur de l’artichaut se sert souvent farci, en salade ou en accompagnement.",
            'image' => 'artichaut.jpg',
            'prix' => 3.5,
            'type_prix' => 'kilo',
            'stock' => 30,
            'note' => 3.5,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Aubergine',
            'description_detaillee' => "<h5>L'aubergine, un caviar de légume</h5><br> 
            L’aubergine est en réalité un fruit mais qui se déguste comme un légume, on vous l’accorde. Peu appréciée parfois, elle est pourtant très savoureuse si on connaît les bonnes recettes…<br>
            Les aubergines se conservent jusqu’à cinq jours dans le bac à légumes du réfrigérateur. On conseille de faire dégorger les aubergines qui peuvent apporter de l’amertume. 
            Il suffit de parsemer les tranches de gros sel et de patienter au moins trente minutes. Ensuite, on rince et on sèche les tranches avant de poursuivre la recette.",
            'image' => 'aubergine.jpeg',
            'prix' => 2.5,
            'type_prix' => 'kilo',
            'stock' => 15,
            'note' => 3.5,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Avocat',
            'description_detaillee' => "<h5>L'avocat, non-coupable de gras</h5><br> 
            Sa réputation de fruit trop gras provient sans doute de la manière dont les américains l’ont longtemps qualifié de « beurre du pauvre ». En un sens, c’est vrai, il s’étale à merveille sur une tranche de pain avec une pincée de sel ! En Europe en revanche, 
            il était considéré comme un produit de luxe et boudé pour sa présumée trop importante richesse en lipides. Pourtant aujourd’hui, l’avocat est couramment consommé et en France, nous en sommes particulièrement friands.<br>
            Si votre avocat arrive chez vous à maturité, conservez-le à température ambiante et consommez-le sous 2 à 3 jours. Si vous voulez les conserver un peu plus longtemps, placez-les dans le bac à légumes du réfrigérateur. À maturité, sa peau vire au marron et au grenat. 
            Pour le déguster, coupez-le en 2 dans le sens de la longueur et séparez les deux moitiés en les faisant pivoter dans le sens contraire. N’hésitez pas à citronner votre avocat afin d’éviter qu’il ne noircisse. 
            Mangez-le nature à la cuillère pour profiter pleinement de ses envoûtantes saveurs ! L’avocat se marie aussi très bien aux épices, aux herbes aromatiques, au poisson comme le thon et aussi aux crustacés. Il est aussi bon ami avec le citron et la pomme.",
            'image' => 'avocat.jpg',
            'prix' => 1.5,
            'type_prix' => 'pièce',
            'stock' => 60,
            'note' => 5,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Banane',
            'description_detaillee' => "<h5>La banane, un fruit qui donne la pêche !</h5><br> 
            Vous connaissez sans doute l’expression courante « avoir la banane » et on espère que vous l’employez souvent ! 
            Cette expression est née à la fois pour la forme de ce fruit qui ressemble à un sourire, mais peut-être aussi pour tous les bienfaits qu’il procure à notre organisme.<br>
            La banane craint le froid, conservez-la à température ambiante entre 4 à 5 jours.
            Glissez-la dans votre sac le matin avant d’aller au travail ! Elle est aussi délicieuse cuite en accompagnement de viandes blanches, poêlée ou même flambée en dessert.",
            'image' => 'banane.jpg',
            'prix' => 1.5,
            'type_prix' => 'kilo',
            'stock' => 40,
            'note' => 4,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Carotte',
            'description_detaillee' => "<h5>Carotte, raconte-nous ton histoire !</h5><br> 
            La carotte est originaire d’Asie Mineure. Autrefois elle était utilisée pour ses valeurs thérapeutiques. Elle devient très consommée à partir du Moyen Âge car elle ne coûte pas cher. 
            Depuis, elle a été améliorée et plusieurs variétés sont nées. Vous ne le saviez peut-être pas mais au départ, la carotte était blanche. Et oui, comme elle pousse sous terre, elle ne voit pas le soleil, c’est pourquoi elle n’est pas pigmentée. 
            La carotte est orange seulement depuis le 19ème siècle. Elle est issue d’un croisement entre une carotte rouge (cultivée sous serre) et d’une carotte blanche. Toutes les variétés que nous consommons aujourd’hui sont issues de croisements entre les anciennes carottes blanches. Les croisements ont eu lieu au cours du développement de la carotte dans le monde.<br>
            Les carottes avec fanes se conservent deux à trois jours dans le bac à légumes du réfrigérateur. Les carottes sans fanes, de garde et de saison se conservent quant à elles jusqu’à 8 jours dans le bac à légumes du réfrigérateur. La carotte se déguste crue, cuite, râpée, confite, en potage, tarte, purée… 
            On peut également utiliser les fanes de carottes pour parfumer une soupe, un bouillon ou une salade.",
            'image' => 'carotte.jpg',
            'prix' => 1.5,
            'type_prix' => 'kilo',
            'stock' => 25,
            'note' => 3,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Champignon de Paris',
            'description_detaillee' => "<h5>Le champignon de Paris, le champignon qui a tout bon</h5><br> 
            Cultivé en France depuis le XIXe siècle, le champignon de Paris a su nous convaincre et trouver sa place dans notre terroir français ainsi que dans nos cuisines !<br>
            Ils se conservent trois à quatre jours au réfrigérateur. Mettez-les dans une boîte hermétique pour éviter les coups et donc qu’ils ne noircissent ! Avant de les consommer, coupez le bout terreux du pied. Passez les rapidement sous l’eau froide puis séchez les avec du papier absorbant.
            Pour conserver la « blancheur » du chapeau, vous pouvez les éplucher. Avec un couteau, tirez la peau en partant de la partie inférieure du chapeau vers le haut. Il se consomme cru ou cuit et est très facile à cuisiner simplement poêlé ou finement émincé dans une salade.",
            'image' => 'champignon.jpg',
            'prix' => 3,
            'type_prix' => 'kilo',
            'stock' => 25,
            'note' => 5,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Citron',
            'description_detaillee' => "<h5>Conseils de conservation et préparation</h5><br> 
            Le citron se conserve plus de 10 jours dans le bac à légumes du réfrigérateur (voire plus pour certains). Dans une corbeille à l’air libre, vous pouvez le conserver une semaine. Pour faire le plein de vitamines le matin, pour ajuster un assaisonnement, un dessert ou une pâtisserie : pressez votre citron ! 
            Notre petit agrume se marie très bien aux poissons, aux marinades et vinaigrettes mais aussi pour toutes sortes de desserts comme les tartes meringuées et les salades de fruits.",
            'image' => 'citron.jpg',
            'prix' => 2.5,
            'type_prix' => 'kilo',
            'stock' => 30,
            'note' => 4.5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Concombre',
            'description_detaillee' => "<h5>Le concombre, un légume hydratant</h5><br> 
            Savez-vous que le concombre est un légume qui a du succès en France ? Chaque année, la quantité de concombre consommée par personne est de 1,8 kilos ! 
            On apprécie depuis longtemps le goût tout doux du concombre frais, dès que le printemps arrive et pour tout l’été. Ce légume devient pendant quelques mois l’ingrédient principal de nos plats.<br>
            Le concombre se conserve 5 jours dans le bac à légume du réfrigérateur. On le consomme le plus souvent cru avec une vinaigrette ou bien du yaourt grec. Le concombre est également délicieux cuit à la vapeur, comme une courgette.",
            'image' => 'concombre.jpg',
            'prix' => 0.5,
            'type_prix' => 'kilo',
            'stock' => 20,
            'note' => 5,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Courgette verte',
            'description_detaillee' => "<h5>Conseils de conservation et préparation</h5><br> 
            La courgette se conserve 4 à 5 jours au réfrigérateur. Il suffit juste de la rincer puis de la détailler en morceaux pour la faire sauter à l’huile d’olive avec une pincée d’herbe de Provence pour passer à table ! Vous souhaitez les faire cuire à l’eau ? 
            Surtout, faites le à feux doux et n’utilisez pas trop d’eau afin qu’elles ne perdent pas leurs principes actifs. Cuisinez vos courgettes en ratatouille ou avec des brochettes de viande. Elle est aussi indispensable dans notre délicieux tian de légumes.",
            'image' => 'courgette.jpg',
            'prix' => 4,
            'type_prix' => 'kilo',
            'stock' => 25,
            'note' => 4.5,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Fenouil',
            'description_detaillee' => "<h5>Le fenouil, une plante mystérieuse…</h5><br> 
            Le fenouil est une plante peu connue ou peu consommée en France. Ce n’est pourtant pas le cas des italiens qui lui réservent une place de choix dans leur gastronomie ! 
            On a donc décidé de lever le voile sur ce légume et de vous donner quelques recettes et astuces de préparation pour l’apprécier à sa juste valeur.<br>
            Le fenouil se conserve pendant plus d’une semaine dans une boîte hermétique au réfrigérateur. Il se consomme aussi bien cuit, au four ou à la poêle, que cru, en salade par exemple.",
            'image' => 'fenouil.jpg',
            'prix' => 1.5,
            'type_prix' => 'kilo',
            'stock' => 15,
            'note' => 4,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Figue',
            'description_detaillee' => "<h5>La Figue, le miel de l’été</h5><br> 
            La figue, fruit de l’été, est là pour nous rafraîchir et nous donner de l’énergie jusqu’à l’automne !<br>
            Elle se conserve à l’air libre environ 4 jours après achat. Il est donc préférable de la consommer rapidement avant qu’elle ne dessèche.
            La figue est très pratique car elle s’adapte à vos envies culinaires. En effet, elle se consomme aussi bien crue que cuite, avec un plat salé ou sucré.",
            'image' => 'figue.jpg',
            'prix' => 4.5,
            'type_prix' => 'kilo',
            'stock' => 30,
            'note' => 4.5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Fraise',
            'description_detaillee' => "<h5>Balèze la fraise !</h5><br> 
            Elle est enfin de retour, notre fraise la star du printemps ! Elle prend le relai des agrumes pour des premiers plats printaniers gorgés de soleil. Elle nous avait manqué très fort à nous aussi ! Pour son retour on vous explique pourquoi on l’aime et on vous raconte tout de ses petits secrets … !
            Le saviez-vous ? Dans l’Antiquité, la fraise était très utilisée dans les produits de beauté pour sa fragrance particulièrement exquise ! Crème, masques ou soin pour les cheveux, la fraise était partout !<br>
            La fraise est un fruit fragile à consommer rapidement. Conservez-les au frais non équeutées. Pensez à les sortir du réfrigérateur au moins une demi-heure avant de les consommer. Elle est délicieuse à croquer, en salade, en tiramisù ou cuite en crumble, en panna cotta et même en version salée !",
            'image' => 'fraise.jpg',
            'prix' => 10,
            'type_prix' => 'kilo',
            'stock' => 35,
            'note' => 5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Haricot vert',
            'description_detaillee' => "<h5>Conseils de conservation et préparation</h5><br> 
            Les haricots se conservent deux à trois jours dans le bac à légumes du réfrigérateur. On distingue deux familles ; les haricots à grains (il faut les écosser) et les haricots filets (les grains sont peu développés et on mange la gousse).
            Pour les déguster, on commence par rincer les haricots et on les équeute (c’est-à-dire que l’on retire les deux extrémités).
            Ensuite, on les plonge dans l’eau bouillante salée pour les faire cuire quelques minutes. On les égoutte lorsqu’ils sont encore fermes, surtout si on prévoit de les réchauffer après.",
            'image' => 'haricot-vert.jpg',
            'prix' => 6.5,
            'type_prix' => 'kilo',
            'stock' => 30,
            'note' => 4,
            'gamme_id' => 2,
        ]);

        Article::create([
            'nom' => 'Kiwi',
            'description_detaillee' => "<h5>Le kiwi, cette petite bombe d'énergie</h5><br> 
            Qu’on se le dise, le kiwi est notre meilleur allié cet hiver ! Ce fruit aux lianes millénaires a traversé les siècles et de nombreux kilomètres pour atterrir dans notre assiette aujourd’hui. Le kiwi à l’allure ronde et légèrement duveteuse cache sous sa peau brune une pulpe verte, sucrée, acidulée et des centaines de minuscules graines noires. 
            Consommer ce fruit c’est s’assurer un plein d’énergie ! Avant de vous parler de ses bienfaits, on s’est intéressé à ses origines et on vous raconte comment ce fruit a changé maintes fois d’identités au cours de sa vie avant de s’appeler kiwi aujourd’hui !<br>
            Le kiwi mûrit après la récolte. Il se conserve une semaine au frais et quelques jours à température ambiante. S’il est trop ferme, laissez le une journée à température ambiante pour qu’il arrive à maturité.",
            'image' => 'kiwi.jpg',
            'prix' => 0.5,
            'type_prix' => 'pièce',
            'stock' => 200,
            'note' => 5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Mangue',
            'description_detaillee' => "<h5>Conseils de conservation et préparation</h5><br> 
            Pour choisir une mangue bien mûre, ne vous fiez pas à sa couleur (certaines variétés restent vertes à maturité) mais testez sa souplesse d’une très légère pression du doigt. 
            Idéalement, il faut la conserver à température ambiante. La mangue se marie particulièrement bien aux viandes et poissons, en coulis, dans des salades de fruits ou même des salades vertes !",
            'image' => 'mangue.jpg',
            'prix' => 6,
            'type_prix' => 'kilo',
            'stock' => 15,
            'note' => 4.5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Melon',
            'description_detaillee' => "<h5>Conseils de conservation et préparation</h5><br> 
            Le melon doit se conserver dans un lieu frais et sec. À température ambiante, vous pouvez le conserver 2 jours maximum. 
            Si vous souhaitez le conserver plus longtemps, vous pouvez le placer au frigo dans le bac à légumes, bien emballé, pendant 3 à 5 jours.",
            'image' => 'melon.jpg',
            'prix' => 1.5,
            'type_prix' => 'pièce',
            'stock' => 50,
            'note' => 4,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Nectarine',
            'description_detaillee' => "<h5>La nectarine : le « doux nectar »</h5><br> 
            Le nom « nectarine » signifie étymologiquement « doux nectar », un fruit juteux et sucré, très apprécié dans l’ensemble de l’Europe depuis plusieurs siècles.<br>
            Les nectarines craignent les fortes chaleurs : si vous ne les consommez pas tout de suite, conservez-les au frais, mais pas au réfrigérateur, qui lui ferait perdre sa saveur. 
            Les nectarines sont délicieuses à croquer, ou dans des salades de fruits, on peut les marier à des herbes aromatiques comme le thym, le romarin, la menthe ou la lavande par exemple. 
            Elles seront délicieuses relevées avec des épices ou accompagnées de fruits secs dans des gâteaux, tartes…",
            'image' => 'nectarine.jpg',
            'prix' => 2,
            'type_prix' => 'kilo',
            'stock' => 40,
            'note' => 4.5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Pamplemousse',
            'description_detaillee' => "<h5>Conseils de conservation et préparation</h5><br> 
            Le pamplemousse se conserve dix jours dans le bac à légumes du réfrigérateur. Faites du pamplemousse votre allié vitamines pour l’hiver ! 
            Il est facile à consommer quotidiennement, pressé ou à la cuillère, et s’intègre aussi facilement à des plats originaux : salades composées, poissons, desserts …",
            'image' => 'pamplemousse.jpg',
            'prix' => 2,
            'type_prix' => 'pièce',
            'stock' => 40,
            'note' => 4,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Pastèque',
            'description_detaillee' => "<h5>La pastèque, la fraîcheur de l'été !</h5><br> 
            La pastèque est originaire d’Afrique. Elle pousse au sol sur une tige grimpante. Elle appartient à la famille des cucurbitacées (grande famille qui comprend le concombre, les courges, le melon…) et peut peser jusqu’à 5 kilos !
            Elle est ronde/ovale avec une écorce épaisse, lisse et marbrée. Il existe trois variétés de pastèques chacune ayant sa caractéristique bien précise : la pastèque à chair rouge et pépins noirs, celle à chair jaune et celle à chair blanche et pépins rouges.
            Une bonne pastèque doit sonner creux lorsque l’on tapote son écorce. Son aspect doit être brillant et elle doit être lourde.<br>
            La pastèque entière se conserve pendant une semaine à température ambiante. Attention s’il fait chaud, elle va continuer à mûrir, privilégiez alors le réfrigérateur.
            Voici une méthode facile pour couper cette grosse pastèque en toute sérénité. Avec un grand couteau coupez une des extrémités (2cm de large) pour obtenir une surface plane. Posez ensuite la pastèque sur cette assise stable, puis vous pouvez la détailler en tranches.",
            'image' => 'pasteque.jpg',
            'prix' => 2,
            'type_prix' => 'kilo',
            'stock' => 60,
            'note' => 3.5,
            'gamme_id' => 1,
        ]);

        Article::create([
            'nom' => 'Pêche',
            'description_detaillee' => "<h5>Conseils de conservation et préparation</h5><br> 
            La pêche se conserve à températures ambiante dans les 1 à 3 jours maximum. Evitez le réfrigérateur, qui lui fait perdre sa saveur.",
            'image' => 'peche.jpg',
            'prix' => 3.5,
            'type_prix' => 'kilo',
            'stock' => 50,
            'note' => 4,
            'gamme_id' => 1,
        ]);




























    }
}
