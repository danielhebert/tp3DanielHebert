<?php $this->Html->script('View/Platforms/onEdit', array('inline' => false)); ?>
<div id="page-container" class="row">

	<?php echo $this->element('menu/side_menu'); ?>
	
	<div id="page-content" class="col-sm-9">

		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Informations sur l'auteur</h3>
			</div>
			<div class="panel-body">
				<p>Daniel Hébert</p>
				<p>420-267 MO Développer un site Web et une application pour Internet.<p>
				<p>Automne 2015, Collège Montmorency.<p>
			</div>
		</div>
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Concept</h3>
			</div>
			<div class="panel-body">
                            <p>SpeedrunBreakdown agit un peu comme un wiki et un site de classement. Un utilisateur confirmé peut créer un tutoriel, qu'il divisera par la suite en segments. 
                            N'importe quel utilisateur peut ensuite soumettre un temps à ces segments, soit le temps mis pour compléter cette section du tutoriel.
                            </p>
                            <p>
                            On regroupe donc l'information sur les meilleures stratégies tout en créant un environnement de compétition pour les joueurs les plus acharnés.
                            </p>			
			</div>
		</div>
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Fonction: ajout/modification d'une image</h3>
			</div>
			<div class="panel-body">
				<p>
				L'image est associée à un <?php echo $this->Html->link('jeu', array('controller' => 'games', 'action' => 'add')); ?>. Un jeu peut seulement être créé par un administrateur.
				</p>
				<p>
				Pour que l'image soit acceptée lors de l'ajout ou la modification d'un jeu, elle doit respecter les critères suivants:
					<ul>
						<li>Être une image de type .gif, .png, .jpg ou .jpeg;</li>
						<li>Posséder une taille inférieure à 1Mo.</li>
					</ul>
				Si ces critères ne sont pas respectés ou s'il y a une autre erreur quelconque, une notification d'erreur(flash/error) apparaîtra dans le formulaire et une précision sur l'erreur apparaîtra près du bouton d'ajout d'image.
				Il est possible que cette précision n'apparaisse pas et que le formulaire soit remis à zéro au lieu d'être préservé lors un échec. Ceci est normalement dû aux limites d'envoi de données dans la configuration de php sur la 
				machine qui héberge le site.
				</p>
				<p>
				Lorsqu'on est dans la vue de modification d'un jeu, près de l'élément du formulaire qui permet d'ajouter une image, l'image du jeu sera affichée. 
				Si cet enregistrement ne possède pas d'image, une zone grise(class="well" dans bootstrap) contiendra un message qui indiquera à l'utilisateur que c'est le cas. Si l'enregistrement a déjà une image et qu'on en ajoute
				pas une nouvelle, l'ancienne sera conservée.
				</p>
			</div>
		</div>
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Fonction: listes liées</h3>
			</div>
			<div class="panel-body">
				<p>
				Les listes liées sont associées aux <?php echo $this->Html->link('tutoriels', array('controller' => 'tutorials', 'action' => 'add')); ?>. Un tutoriel peut être créé par un superutilisateur/auteur à condition qu'il ait confirmé son inscription.
				</p>
				<p>
				Les speedruns ne sont pas seulement catégorisées par leur jeu. En effet, elles sont souvent catégorisées aussi par la version de ce jeu. 
				Par exemple, il arrive que la version japonaise d'un jeu soit sortie quelques mois avant la version américaine. Comme cette dernière aura été davantage testée,
				elle aura fort probablement moins de bogues, de failles, voire des fonctionnalités différentes.
				</p>
				<p>
				Ceci peut faire une différence très importante dans la rédaction d'un tutoriel, donc on permet maintenant à l'utilisateur de spécifier la version du jeu.
				</p>
				<p>
				Pour se faire, lorsqu'il choisi son jeu dans la première liste, la deuxième liste se met à jour et offre le choix d'une version propre à ce jeu. 
				Si un jeu n'a pas de version qui lui est associée, le jeu n'apparaîtra tout simplement pas dans la première liste
				(l'administrateur aurait dû créer les versions nécessaires lorsqu'il a créé le jeu).
				</p>
			</div>
		</div>
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Fonction: autocomplétion</h3>
			</div>
			<div class="panel-body">
				<p>
				La fonction d'autocomplétion est associée à un <?php echo $this->Html->link('jeu', array('controller' => 'games', 'action' => 'add')); ?>. Un jeu peut seulement être créé par un administrateur.
				</p>
				<p>
				Cette fonction est utilisable sur le champs de la plateforme(qui est la console/le système sur lequel tourne le jeu). 
				</p>
				<p>
				Au lieu que l'utilisateur ait à écrire manuellement un nom long de plateforme, on essaye de compléter automatiquement ce qu'il a commencé d'écrire. 
				Par exemple, plutôt que d'écrire directement "Super Nintendo", l'utilisateur aura qu'à écrire "s" et cliquer sur le choix offert par l'autocomplétion.
				</p>
			</div>
		</div>
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Fonction: gestion de l'envoi de courriel et de l'activation d'un compte utilisateur</h3>
			</div>
			<div class="panel-body">
				<p>
				On commence par inscrire un nouvel <?php echo $this->Html->link('utilisateur', array('controller' => 'users', 'action' => 'add')); ?>.
				</p>
				<p>
				Un courriel sera envoyé à l'adresse spécifiée à l'inscription. Ce courriel contient un lien pour confirmer l'inscription du compte qui vient d'être créé.
				</p>
				<p>
				Le compte sera toutefois utilisable même s'il n'est pas confirmé. Cependant, il sera très limité dans ses options: il pourra presque exclusivement consulter les enregistrements.
				En effet, le seul type d'ajout qu'il pourra effectuer sera celui d'un <?php echo $this->Html->link('temps', array('controller' => 'times', 'action' => 'add')); ?>.
				</p>
				<p>
				Afin de lui rappeler que son compte n'est pas confirmé, une notification(flash/warning) apparait à chaque fois qu'il se connecte au site. Cette notification inclue une 
				<?php echo $this->Html->link('fonction', array('controller' => 'users', 'action' => 'resendLink')); ?> pour renvoyer un courriel qui contient le lien de confirmation de l'inscription du compte. 
				L'utilisateur a également la possibilité d'éxécuter cette fonction en cliquant sur le menu utilisateur à gauche et en choisissant l'option appropriée. À noter que cette fonction est normalement invisible pour
				les utilisateurs confirmés et que s'ils l'entrent manuellement dans la barre d'adresse, ils seront simplements avertis que leur compte est déjà activé.
				</p>
				<p>
				Autrement, le fameux lien contenu dans le courriel contient un token spécifique à chaque compte. Lorsqu'on l'utilise, on est redirigé à la page d'accueil avec une notification qui nous explique ce qui s'est 
				passé(si le lien était invalide, si la confirmation a réussi, etc).
				</p>
			</div>
		</div>
		
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Schéma de la base de données</h3>
			</div>
			<div class="panel-body">
				<?php echo $this->Html->image('schema_bdd.png', array('escape' => false, 'class' => 'thumbnail')); ?>
				<p>
				Ce schéma n'existe pas ailleurs sur Internet puisqu'il est ma création.
				</p>
			</div>
		</div>
			
	</div><!-- /#page-content .col-sm-9 -->

</div><!-- /#page-container .row-fluid -->