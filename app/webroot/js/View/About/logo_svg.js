const X_DEPART = -200;
const X_FIN = 600;
const DELAI_CLIGNOTEMENT = 50;

const VITESSE_INITIALE = 750;
const VITESSE_FINALE = 1750;

const COULEUR_DEBUT_TEXTE = "#300000";
const COULEUR_FIN_TEXTE = "#B00000";
const DELAI_ALTERNANCE_TEXTE = 1500;

const ID_DIV = "#logoDiv";
const CHEMIN_IMG = "../../img/srb.svg";
const ID_TEXTE = "#texteToFlash";
const ID_VAISSEAU = "#wraith";
const ID_PROPULSION = "#fire";

window.onload = function() {
	var s = Snap(ID_DIV);

	Snap.load(CHEMIN_IMG, function(f) {
		texte = f.select(ID_TEXTE);
		vaisseau = f.select(ID_VAISSEAU);
		propulsion = f.select(ID_PROPULSION);

		deplacerVaisseau(VITESSE_INITIALE);
		deplacerPropulsion(VITESSE_INITIALE);
		clignoterPropulsion(0);
		alternerCouleurTexte();

		s.append(f);
	});
};

function deplacerPropulsion(vitesse) {
	propulsion.stop().animate({
			x: X_FIN
		}, vitesse,
		function() {
			propulsion.attr({
				x: X_DEPART
			});
			deplacerPropulsion(VITESSE_FINALE);
		});
}

function clignoterPropulsion(visible) {
	visible = ((visible == 1) ? 0 : 1);
	propulsion.attr({
		opacity: visible
	});
	setTimeout(function() {
		clignoterPropulsion(visible);
	}, DELAI_CLIGNOTEMENT);
}

function deplacerVaisseau(vitesse) {
	vaisseau.stop().animate({
			x: X_FIN
		}, vitesse,
		function() {
			vaisseau.attr({
				x: X_DEPART
			});
			deplacerVaisseau(VITESSE_FINALE);
		});
}

function alternerCouleurTexte() {
	texte.stop().animate({
			fill: COULEUR_FIN_TEXTE
		}, DELAI_ALTERNANCE_TEXTE,
		function() {
			texte.animate({
					fill: COULEUR_DEBUT_TEXTE
				}, DELAI_ALTERNANCE_TEXTE,
				function() {
					alternerCouleurTexte();
				});
		}
	);
}