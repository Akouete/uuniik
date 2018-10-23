@php
session_start();
  //require_once 'C:/xampp/htdocs/site/uuniik_project/uuniik/resources/views/html2pdf/src/html2pdf.php';

  require_once 'C:/xampp/htdocs/site/uuniik_project/uuniik/resources/views/html2pdf/vendor/autoload.php';

  use Spipu\Html2Pdf\Html2Pdf;
  use Spipu\Html2Pdf\Exception\Html2PdfException;
  use Spipu\Html2Pdf\Exception\ExceptionFormatter;

  $pdf = new Html2Pdf("p","A4","fr");

  // SAUVGARDE LA VARIABLE hits DANS LE FICHIER DE SESSION
  $hits =0;

  // TRAITEMENT SUR LE FICHIER TEXTE
  if(empty($hits)){
    $fp=fopen("nbvente.txt","a+"); //OUVRE LE FICHIER compteur.txt
    $num=fgets($fp,4096); // RECUPERE LE CONTENUE DU COMPTEUR
    fclose($fp); // FERME LE FICHIER
    $hits=$num - -1; // TRAITEMENT
    $fp=fopen("nbvente.txt","w"); // OUVRE DE NOUVEAU LE FICHIER
    fputs($fp,$hits); // MET LA NOUVELLE VALEUR
    fclose($fp); // FERME LE FICHIER

    $fp2=fopen("typevente.txt","r+"); // OUVRE DE NOUVEAU LE FICHIER
    fputs($fp2,strtolower(Session::get("product")));
    fclose($fp2);
  }

  $publickey;
  $publickey =  password_hash("limmortalitedelameestinevitable", PASSWORD_BCRYPT);



ob_start();

 if(strtolower(Session::get("product")) == "bonheur") {
   $text = "Le bonheur est un état durable de plénitude, de satisfaction ou de sérénité, état agréable et équilibré de l'esprit et du corps, d'où la souffrance, le stress, l'inquiétude et le trouble sont absents. Le bonheur n'est pas seulement un état passager de plaisir, de joie, il représente un état d'équilibre qui dure dans le temps. C'est un concept qui a été étudié en psychologie, en sociologie ainsi qu'en philosophie. La plupart des courants philosophiques occidentaux succédant à Socrate sont des eudémonismes, des doctrines visant à atteindre le bonheur. Cette recherche du bonheur individuel en philosophie se renforce encore de manière significative avec l'apparition de l'épicurisme et du stoïcisme.";
 }
 else if(strtolower(Session::get("product")) == "santé") {
   $text = "La santé est un état de complet bien-être physique, mental et social, et ne consiste pas seulement en une absence de maladie ou d'infirmité.
   Cette définition est inscrite au préambule1 de 1946 à la constitution de l'Organisation Mondiale de la Santé (OMS). Cette définition de l'OMS n'a pas été modifiée depuis 1946. Elle implique que tous les besoins fondamentaux de la personne soient satisfaits, qu'ils soient affectifs, sanitaires, nutritionnels, sociaux ou culturels et du stade de l'embryoN
   Elle se présente donc plutôt comme un objectif; Au XIXe siècle c'est celui donné pour la santé dans l'environnement2, avec une mise en réseau social. Cet objectif d'ensemble lié à l'espérance de vie humaine3, certains le jugeront utopique puisqu'il classe, selon le pays étudié, 70 à 99 % des gens comme n'étant pas en bonne santé ou étant malade [réf. nécessaire]. Selon René Dubos, l'« État physique et mental relativement exempt de gênes et de souffrances qui permet à l'individu de fonctionner aussi longtemps que possible dans le milieu où le hasard ou le choix l'ont placé », qui présente la santé comme la convergence des notions d'autonomie et de bien-être";
 }
 else if(strtolower(Session::get("product")) == "amour") {
   $text = "L'amour désigne un sentiment intense d'affection et d'attachement envers un être vivant ou une chose qui pousse ceux qui le ressentent à rechercher une proximité physique, spirituelle ou même imaginaire avec l'objet de cet amour et à adopter un comportement particulier.
   En tant que concept général, l'amour renvoie la plupart du temps à un profond sentiment de tendresse envers une personne. Toutefois, même cette conception spécifique de l'amour comprend un large éventail de sentiments différents, allant du désir passionné et de l'amour romantique, à la tendre proximité sans sexualité de l'amour familial ou de l'amour platonique et à la dévotion spirituelle de l'amour religieux. L'amour sous ses diverses formes agit comme un facteur majeur dans les relations sociales et occupe une place centrale dans la psychologie humaine, ce qui en fait également l'un des thèmes les plus courants dans l'art.";
 }
 else if(strtolower(Session::get("product")) == "reussite") {
   $text = "La réussite est à la fois un état d’être et les actions en symbiose à cet état d’être. La réussite c’est quand on fait ce que l’on est. Je pourrais essayer de vous le décrire de mille façons mais celle que je choisis est simple : quand on réussit, on ne se pense pas à réussir, ON EST tout simplement. Il est évident que cela n’est pas aussi glamour ou vendeur qu’une belle maison avec piscine, voir pas vendeur du tout. Et oui quand il s’agit d’un état d’être, cela n’a plus rien à voir avec l’argent car cela ne s’achète pas, cela se vit.
   Le meilleur conseil que je puisse donner pour aller vers votre réussite : laissez-tomber vos masques et faites ce que vous aimez !
   Tous mes vœux de réussites.";
 }
 else if(strtolower(Session::get("product")) == "richesse") {
   $text = "La richesse est l'abondance de biens de valeur ou de revenus1.
   Un individu, communauté ou pays qui possède une abondance de bien et possession est riche. L'opposition de la richesse, est la pauvreté. Le concept de richesse est très centrale dans le domaine de l’économie. La présence de richesse dans un pays et sa croissance est mesurée par le produit intérieur brut (PIB).
   La répartition de la richesse a fait l'objet de réflexions de la part de penseurs depuis l'Antiquité. Selon Platon, la richesse devait être distribuée de façon égalitaire, alors que selon Aristote, elle devait être distribuée proportionnellement à l'effort de chacun2. En introduisant la notion de chrématistique, Aristote a condamné la pratique visant à l'accumulation de richesses pour elles-mêmes, et non en vue d'une fin autre que le plaisir personnel.
   Au Moyen Âge, saint Thomas d'Aquin a cherché à réconcilier la pensée d'Aristote avec la doctrine chrétienne, et a ainsi développé la philosophie scolastique. Dans ce cadre, il a repris les idées d'Aristote sur l'économie, et a tenté de faire évoluer la pensée de l'Église dans le domaine des taux d'intérêt.
   Du XVIe siècle jusqu'au milieu du XVIIIe siècle, la doctrine économique du mercantilisme a prôné l'enrichissement des États-nations d'abord au moyen de l'or importé des colonies (bullionisme développé surtout en Espagne et au Portugal), puis du commerce, mais aussi de l'industrialisation.
   Dans la deuxième moitié du XVIIIe siècle, Adam Smith, fondateur de l'école dite classique d'économie, a critiqué le mercantilisme, et en particulier le bullionisme, en déniant à l'or et à l'argent leur valeur de mesure de la richesse, et soulignant qu'il s'agit d'une richesse essentiellement princière. Il explique que l'origine de la richesse des nations vient plutôt du travail (concept de division du travail), de l'accumulation du capital, et de la taille du marché3.
   Par la suite, la production de richesses sera associée à la notion de facteurs de production, qui sont essentiellement le capital et le travail.";
 }
 else if(strtolower(Session::get("product")) == "sommeil") {
   $text = "Le sommeil est un état naturel récurrent de perte de conscience (mais sans perte de la réception sensitive) du monde extérieur, accompagnée d'une diminution progressive du tonus musculaire, survenant à intervalles réguliers. L'alternance veille-sommeil correspond à l'un des cycles fondamentaux chez les animaux : le rythme circadien. Chez l'être humain, le sommeil occupe près d'un tiers de la vie en moyenne.
   Le sommeil se distingue de l'inconscience (ou coma) par la préservation des réflexes et par la capacité de la personne endormie à ouvrir les yeux et à réagir à la parole et au toucher. Il existe une organisation du sommeil et de ses trois états. Il est question de cycle circadien pour l'alternance entre la veille et le sommeil. Il est question de cycle ultradien pour l'alternance entre le sommeil lent et le sommeil paradoxal.
   Le sommeil dépend du noyau préoptique ventrolatéral (VLPO). Déclenché par l'accumulation quotidienne d'adénosine, le VLPO envoie aux centres de stimulation le signal d'arrêter la production d'histamine et d'autres substances qui nous tiennent éveillés. Durant le sommeil, une partie des synapses sont remodelées et ce mécanisme pourrait avoir des explications et implications énergétiques, métaboliques, informationnelles et mémorielles1.
   Certaines femmes dorment mal pendant leurs règles (elles sont deux fois plus sujettes aux insomnies que les hommes) et beaucoup d'entre elles durant la ménopause. Les personnes âgées dorment en général moins bien que les jeunes.";
 }
 else if(strtolower(Session::get("product")) == "fierté") {
   $text = "Appartenant au même champ lexical que l’orgueil, la fierté a comme lui plusieurs définitions qui se recoupent d’ailleurs (les deux mots étant pratiquement interchangeables), et qui s'entendent selon le contexte. Il peut s'agir :
    du caractère de quelqu'un qui se croit supérieur aux autres ; morgue, arrogance, hauteur. Du sentiment exagéré de sa propre valeur : être fier comme un coq, ou un paon (le mot fierté pouvant ici s'entendre comme synonyme de vanité dans l'une de ses définitions les plus courantes, à savoir l'étalage public de l'estime de soi),
    de l'indépendance de caractère, de l'orgueil, ou du sentiment de son honneur qu'une personne peut nourrir. Il s'agit alors de l'amour propre d'une personne, c'est ce sens qui se trouve mobilisé dans l'expression « Un peu de fierté bon sang », ou « N'avez-vous donc aucun orgueil »... Il est très important de noter qu'il s'agit d'un sentiment intérieur, au contraire de la vanité qui cherche à obtenir la reconnaissance d'autrui ; la fierté (ou l'orgueil), quant à elle est une image de soi positive, que l'on cherche à maintenir sans se positionner par rapport à autrui. Dans l'idéal, cela se manifeste par la volonté d'accomplissement, de dépassement, et par le refus d'accomplir des actes que l'on estime de nature à nuire à cette image positive que nous avons de nous-mêmes.
    La fierté est souvent mise en avant dans le milieu du sport, ou un sportif désire par dessus tout, surpasser ses capacités pour devenir meilleur.
    Le piège le plus fréquent étant la confusion avec la vanité qui est la satisfaction et non pas l'estime de soi-même, un sentiment qui n'admet pas la remise en cause. Mais aussi l'étalage de cette satisfaction (désigne aussi ce qui est vain et / ou futile mais cela est sans réel objet ici).
    L'arrogance, quant à elle, est une attitude qui se manifeste par des manières hautaines, blessantes ; un de ses synonymes est la morgue.";
 }
 else if(strtolower(Session::get("product")) == "temps") {
   $text = "Le temps est une notion qui rend compte du changement dans le monde. Le questionnement s'est porté sur sa « nature intime » : propriété fondamentale de l'Univers, ou plus simplement produit de l'observation intellectuelle et de la perception humaine. La somme des réponses ne suffit pas à dégager un concept satisfaisant du temps. Toutes ne sont pas théoriques : la « pratique » changeante du temps par les hommes est d’une importance capitale.
   Il n'existe pas de mesure du temps de la même manière qu'il existe, par exemple, une mesure de la charge électrique. Dans ce qui suit il faudra comprendre « mesure de la durée » en lieu et place de mesure du temps. La mesure de la durée, c'est-à-dire du temps écoulé entre deux événements, se base sur des phénomènes périodiques (jours, oscillation d'un pendule...) ou quantiques (temps de transition électronique dans l'atome par exemple). La généralisation de la mesure du temps a changé la vie quotidienne, la pensée religieuse, philosophique, et scientifique. Pour la science, le temps est une mesure de l'évolution des phénomènes. Selon la théorie de la relativité, le temps est relatif (il dépend de l'observateur), et l'espace et le temps sont intimement liés.";
 }
 else if(strtolower(Session::get("product")) == "tranquilité") {
   $text = "La tranquillité est le caractère, ou l'état, de ce qui est calme, serein, sans inquiétude, sans angoisse. Le mot tranquillité
   apparaît dans de nombres textes, allant des écrits religieux de Bouddhisme, ou le terme passaddhi se rapporte à la tranquillité du corps,
   des pensées et de la conscience sur la voie de la Libération, jusqu’à un assortiment de documents, ou l'interprétation du mot est
   directement liée à l'engagement avec l’environnement naturel.
   Être psychologiquement dans un environnement tranquille ou reconstituant permet aux individus de prendre du répit de leurs périodes
    d'attention soutenue, qui caractérise la vie moderne. Dans le développement de leur théorie de la restauration de l'attention
    (en)(Attention Restauration Theory (ART)), Kaplan et Kaplan1 ont proposé que le rétablissement d'une surcharge cognitive puisse
    être atteint plus efficacement en renouant avec un environnement naturel fortifiant, qui s’éloigne des distractions quotidiennes
    et permet à l'imagination de s’égarer, et donc permettre aux individus de renouer avec leurs environnements. La théorie fonctionne
    sur le principe que le nombre de réflexions possibles dans un tel environnement dépend du type d'engagement cognitif. Par exemple,
    l'attrait que dégage l’environnement. Un environnement d'un faible attrait est réputé pour avoir assez d’intérêt pour retenir
    l'attention, mais pas assez à tel point qu'il nuit à l'habiliter de réfléchir. En ce sens que, le faible attrait (Soft Fascination),
    qui a été pris par Herzog2 et Pheasant3 comme un terme correct pour décrire la tranquillité, procure un niveau satisfaisant de
    retour sensoriel qui n'implique aucun autre effort que de s'extirper d'un environnement mental encombré.";
 }
 else if(strtolower(Session::get("product")) == "paix") {
   $text = "Sociologiquement, la paix désigne l'entente amicale de tous les individus qui composent une société. Elle n'implique pas l'absence de conflit, mais une résolution systématiquement calme et mesurée de toute difficulté conséquente à la vie en communauté, principalement par le dialogue.
   En ce sens, la paix entre les nations est l'objectif de nombreux Hommes et organisations comme L'ONU qui œuvre pour la paix.
   L'articulation entre la paix et son opposé (guerre, violence, conflit, colère, etc.) est une des clés de nombreuses doctrines, religieuses ou politiques, clé fondamentale bien que généralement non explicite.
   Dans le yi-king, l'hexagramme opposé à celui de la paix est celui de la stagnation. Symboliquement, cela indique que la paix n'est pas un absolu, mais une recherche permanente. Et que le conflit n'est pas l'opposé de la paix. Il convient dans une démarche de paix de transformer le conflit pour le résoudre sans répondre par la violence, non pas de le supprimer. Les démarches non-violentes incarnent cette démarche de transformation pacifique du conflit.
   Comme l'indique le préambule de l'UNESCO, « c'est dans l'esprit des hommes que naissent les guerres, c'est dans leur esprit qu'il faut ériger les défenses de la paix ».";
 }
 else if(strtolower(Session::get("product")) == "place au paradis") {
   $text = "Le paradis ou jardin d'Éden représente souvent le lieu final où les humains seront récompensés de leur bon comportement. C'est un concept important présenté au début de la Bible, dans le livre de la Genèse. Il a donc un sens particulier pour les religions dites abrahamiques.
   Dans un sens plus élargi, le concept de paradis est présent dans presque toutes les religions. Les croyants parlent aussi du « Royaume de Dieu » qui sera manifesté à la fin du monde. Un concept semblable, le nirvāna, existe dans l'hindouisme, le jaïnisme et le bouddhisme, même s'il représente dans ce cas davantage un état spirituel qu'un lieu physique.";
 }
 else if(strtolower(Session::get("product")) == "sagesse") {
   $text = "La sagesse (équivalent en grec ancien σοφία / sophía) est un concept utilisé pour qualifier le comportement d'un individu, souvent conforme à une éthique, qui allie la conscience de soi et des autres, la tempérance, la prudence, la sincérité, le discernement et la justice s'appuyant sur un savoir raisonné.
   Dans le domaine de la philosophie, la sagesse représente un idéal de vie vers lequel tendent les philosophes, « amoureux de la sagesse », qui « pensent leur vie et vivent leur pensée »3, à travers le questionnement et la pratique de vertus.
   Les philosophes grecs différenciaient la sagesse théorique (sophia) de la sagesse pratique (phronèsis) : la vraie sagesse serait la conjonction des deux4.
   Le calme et la modération apparaissent fréquemment comme composantes de la sagesse dans les définitions académiques5. L’usage retient parfois ces seules qualités lorsqu’il qualifie une personne de sage, comme pour un enfant lorsqu’il est obéissant et tranquille2.";
 }
 else if(strtolower(Session::get("product")) == "joie") {
   $text = "La joie est une émotion ou un sentiment de satisfaction plus ou moins durable, qui affecte l'être entier au moment où ses aspirations, ses ambitions, ses désirs ou ses rêves viennent à être satisfaits d'une manière effective ou imaginaire.
   La joie est une notion qui désigne, dans son sens le plus courant, le sentiment d'une personne en présence d'une autre personne, d'une situation ou d'un bien qui lui convient.
   Dans la philosophie antique, la joie est à rapprocher du terme de mania (μανια), « délire » ou « folie » présent notamment dans le Phèdre de Platon. La mania désigne la présence du divin dans ce qu'elle a de transformateur et de dynamisant sur le sujet : une notion à rapprocher de l'enthousiasme (ενθουσιασμός) qui affecte celui qui contemple le bien ou le beau, et qui va donc au-delà du sentiment.[réf. nécessaire]
   Cicéron en a une conception plus proche du sens courant : pour lui, la joie est un état de l'âme, qui, confrontée à la possession d'un bien, n'en perd pas pour autant la sérénité.[réf. nécessaire]
   Dans la philosophie moderne, de nouvelles conceptions de la joie apparaissent. Au XVIIe siècle, c'est le philosophe hollandais Spinoza qui est le grand penseur de la joie, en particulier dans son Éthique où la joie forme, avec la tristesse et le désir, l'un des trois affects fondamentaux de l'être humain1 : tous les autres sentiments (amour, haine, espérance, crainte, etc.) se définissent comme des formes particulières de joie ou de tristesse. La joie (lætitia en latin) est définie par Spinoza   comme « le passage de l'homme d'une moindre à une plus grande perfection »2, c'est-à-dire comme une augmentation de forces et de la réalisation de soi d'un être humain. La joie est ainsi un accroissement de notre puissance, lié à la réalisation de nos désirs et de notre effort (conatus en latin) pour persévérer dans l'existence.";
 }
 else if(strtolower(Session::get("product")) == "famille") {
   $text = "Une famille est une communauté d'individus réunis par des liens de parenté existant dans toutes les sociétés humaines, selon l'anthropologue Claude Lévi-Strauss1. Elle est dotée d'un nom, d'un domicile, et crée entre ses membres une obligation de solidarité morale et matérielle (notamment entre époux, d’une part, et entre parents et enfants, d’autre part), censée les protéger et favoriser leur développement social, physique et affectif. Si cette notion est universelle, le nombre d'individus qu'elle inclut ou la solidarité accordée est variable, c'est même une des notions centrales dans la culture. Il en découle de grandes différences par exemple dans le droit, dans la transmission du patrimoine ou la religion.";
 }
 else if(strtolower(Session::get("product")) == "intelligence") {
   $text = "L'intelligence est l'ensemble des processus retrouvés dans des systèmes, plus ou moins complexes, vivants ou non, qui permettent de comprendre, d'apprendre ou de s'adapter à des situations nouvelles. La définition de l'intelligence ainsi que la question d'une faculté d'intelligence générale ont fait l'objet de nombreuses discussions philosophiques et scientifiques. L'intelligence a été décrite comme une faculté d'adaptation (apprentissage pour s'adapter à l'environnement ou au contraire, faculté de modifier l'environnement pour l'adapter à ses propres besoins). Dans ce sens général, les animaux, les plantes, les outils informatiques (apprentissage profond), font preuve d'une intelligence.";
 }
 else if(strtolower(Session::get("product")) == "univers") {
   $text = "L'Univers est l'ensemble de tout ce qui existe, régi par un certain nombre de lois.
   La cosmologie cherche à appréhender l'Univers d'un point de vue scientifique, comme l'ensemble de la matière distribuée dans l'espace-temps. Pour sa part, la cosmogonie vise à établir une théorie de la création de l'Univers sur des bases philosophiques ou religieuses. La différence entre ces deux définitions n'empêche pas nombre de physiciens d'avoir une conception finaliste de l'univers (voir à ce sujet le principe anthropique).
   Si l'on veut faire correspondre le mouvement des galaxies avec les lois physiques telles qu'on les conçoit actuellement, on peut considérer que l'on n'accède par l'expérience qu'à une faible partie de la matière de l'Univers1, le reste se composant de matière noire. Par ailleurs, pour expliquer l'accélération de l'expansion de l'Univers, il faut également introduire le concept d'énergie sombre. Plusieurs modèles alternatifs ont été proposés pour faire correspondre les équations et nos observations en prenant d'autres approches.";
 }
 else if(strtolower(Session::get("product")) == "one piece") {
   $text = "Le One Piece (ひとつなぎの大秘宝, Wan Pīsu, pouvant être lu 'Hitotsunagi no Daihihō' soit 'Le Grand Trésor de One Piece') est un trésor légendaire, dont on dit qu'il est d'une valeur inestimable. Son précédent possesseur, qui l'a caché quelque part, était le Seigneur des Pirates, Gol D. Roger.
   Il est communément admis qu'il a été caché quelque part au plus profond de la Route de tous les Périls, possiblement dans la toute dernière île du Nouveau Monde, Rough Tell, par Roger. ";
 }
 else if(strtolower(Session::get("product")) == "charisme") {
   $text = "Le charisme est la qualité d'une personne qui séduit, influence, voire fascine, les autres par ses discours, ses attitudes, son tempérament, ses actions. Un charisme puissant, fascinant, trouble et neutralise le jugement d'autrui ; le charisme aide à diriger, voire manipuler, les autres. Le charisme est souvent un don naturel ou une façon d'être, mais il est possible de travailler sur soi pour le développer. Le charisme est aussi lié à la confiance en soi, la personnalité, l'intérieur de la personne.";
 }
 else if(strtolower(Session::get("product")) == "copin") {
   $text = "Un « petit ami » est une personne de sexe masculin avec qui l'on partage une relation amoureuse et/ou sexuelle.
   Normalement, le terme est réservé à une relation engagée récemment, puisque d'autres termes comme « mari » ou « partenaire » sont plus communément utilisés pour les relations à long terme.;
   Petit : Dans un emploi hypocoristique. Une gentille petite femme. Un petit bout de chou. Un petit ami, une petite amie (fam.), un ami, une amie de cœur. En manière d'adresse, souvent précédé du possessif. Ma petite dame. Petite mère. Mon petit mari. Mon petit bonhomme.
   Hypocoristique : Se dit d'une forme linguistique exprimant une intention affectueuse. (Les hypocoristiques sont souvent formés grâce à des suffixes diminutifs [frérot] ou par redoublement [fifille] ; ce sont souvent des appellatifs.)";
 }
 else if(strtolower(Session::get("product")) == "copine") {
   $text = "Une « petite amie » est une personne de sexe féminin avec qui l'on partage une relation amoureuse et/ou sexuelle.
   Normalement, le terme est réservée à une relation engagée récemment, puisque d'autres termes comme « femme » ou « compagne » sont plus communément utilisés pour les relations à long terme.";
 }
 else if(strtolower(Session::get("product")) == "rêve") {
   $text = "Le rêve est une activité psychique qui se produit au cours du sommeil. Il s'accompagne le plus souvent d'images et de sentiments qui témoignent de la vie affective du rêveur.
   Le rêve est un fait vécu qui se caractérise par une suite organisée ou non d'images et de représentations mentales qui se présentent à l'esprit au cours du sommeil4. Commun à de nombreuses espèces animales, il est également perceptible par ses manifestations externes. Chez l'être humain, le rêve se distingue de certaines hallucinations (comme l'état de rêve ou onirisme) et de la rêverie qui, eux, sont vécus à l’état éveillé.";
 }
 else if(strtolower(Session::get("product")) == "chance") {
   $text = "La chance est un concept qui exprime la réalisation d'un événement, positif, améliorant une situation humaine, ou même par extension toute entité vivante, sans nécessairement qu'il y ait un lien de cause à effet entre le désir et sa réalisation, positive.
   La chance relève de l'amélioration d'une situation sans lien causale avec les actions de l'individu, sans action maîtrisée sur le résultat positif atteint. L’étymologie latine du mot et son usage ne peuvent s'appliquer uniquement si l’événement et le résultat sont 'tombés' sur un individu en améliorant notablement sa situation. Tout autre explication sémantique, relève plutôt de l'interprétation intellectuelle, managériale, de tendance de mode ou encore de propos de 'gourou' à la mode.
   Vu sous cet angle, il s'agit d'une superstition si la personne se croit visée par les événements positifs.";
 }
 else if(strtolower(Session::get("product")) == "espoir") {
   $text = "L’espoir, ou espérance, est une disposition de l'esprit humain qui consiste en l'attente d'un futur bon ou meilleur. L'espoir a fait l'objet d'études philosophiques. Classé parmi les émotions, l'espoir est généralement opposé au désespoir.
   En France, la sagesse populaire réfléchit sur l'espoir par le biais de proverbes comme : « Tant qu'il y a de la vie, il y a de l'espoir » ou au contraire « L'espoir fait vivre ». Des expressions comme « faux espoirs », « espoirs trompeurs » ou « espoirs déçus » mettent en avant le fait que dans certaines situations les espoirs peuvent donner des illusions.";
 }
 else if(strtolower(Session::get("product")) == "sourire") {
   $text = "Le sourire est une expression du visage témoignant en général de la sympathie.
   Le mot sourire est apparu au Moyen Âge, issu du verbe latin sub-ridere qui signifie prendre une expression rieuse ou ironique, destiné à tromper, mais le sens se rapproche plus du mot latin risus qui appartient au vocabulaire du rire.
   Le sourire est une expression du visage qui se forme par la tension de muscles, plus particulièrement aux deux coins de la bouche, mais aussi autour des yeux1. Il exprime généralement le plaisir ou l'amusement, mais aussi l'ironie, et joue ainsi un rôle social important.
   Le cerveau humain serait capable d'isoler un sourire du reste du visage, ce qui se vérifie en observant une photo retournée verticalement où le sourire est, lui, resté dans le bon sens1.
   Le sourire est une attitude assimilée par renforcement comme positive, et cela dès la naissance, mais il est considéré comme inné et génétiquement déterminé, puisqu’il apparaît chez des enfants sourds et aveugles de naissance.";
 }
 else {
   $text = strtolower(Session::get("product"));
 }
@endphp

<style type="text/css">
#logo {
  width: 30px;
  height: 30px;
}
#wikilogo {
  max-width: 100px;
  max-height: 100px;
}
    table {
        width: 100%;
        color: rgb(80,80,80);
        font-family: helvetica;
        line-height: 10mm;
        border-collapse: collapse;
    }
</style>

<page backtop="10mm" backleft="10mm" backright="10mm" backbottom="10mm" footer="page;">

    <page_footer style="text-align: center;">
        <p><?php echo date("Y"); ?> Humanity Bigbullshit</p>
        <p style="font-size: 6px; color: rgb(200,200,200)">Public key: {{ $publickey }}</p>
    </page_footer>

    <page_header style="text-align: center;">
        <img src="https://digitalloc.io/digitalloc/vue/img/digitalloclogop.png" alt="" id="logo">
        <h3>Believe and Trust</h3>
    </page_header>

    <div class="" style="margin-top: 50px; width: 100%; text-align: center;">
        <h1>{{ strtoupper(Session::get("product")) }}</h1>
        <h3>Par la présente, vous êtes en possession officiel du secret, {{ strtoupper(Session::get("product")) }}</h3>
    </div>

    <div class="" style="margin-top: 30px; width: 100%; text-align: center;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/80/Wikipedia-logo-v2.svg/1200px-Wikipedia-logo-v2.svg.png" alt="" id="wikilogo">
        <p>D'après Wikipedia</p>
    </div>

    <div class="" style="margin-top: 50px; width: 100%; text-align: center;">
        <p>" {{ $text }} "</p>
    </div>

    <div class="" style="margin-top: 30px; width: 100%; text-align: right;">
        <p>Fait par Homo Deus, le voyageur du temps</p>
    </div>

    <div class="" style="margin-top: 30px; width: 100%; text-align: right;">
      <img src="https://i.pinimg.com/originals/26/66/65/266665d65eeaf915ccf8a5fe010dd8a8.png" alt="" id="wikilogo">
      <p>Mars Civilization FirstCity, year 2256</p>
      <p style="color: rgb(200,200,200)">A conservé farouchement</p>
    </div>


</page>

<?php
    $content = ob_get_clean();
    try {
        $pdf = new HTML2PDF("p","A4","fr");
        $pdf->pdf->SetAuthor('Big Bullshit');
        $pdf->pdf->SetTitle(Session::get("product"));
        $pdf->pdf->SetSubject(Session::get("product"));
        $pdf->pdf->SetKeywords('HTML2PDF, '.Session::get("product").', PHP');
        $pdf->writeHTML($content);
        $pdf->Output(Session::get("product").'.pdf', 'D');
    } catch (HTML2PDF_exception $e) {
        die($e);
    }

?>
