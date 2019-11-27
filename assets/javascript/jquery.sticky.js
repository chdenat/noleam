/*
Créateur : Mathieu Chartier
Source : http://blog.internet-formation.fr/2017/02/astuce-et-code-creer-un-bloc-ou-menu-sticky-sans-plugin-jquery/
Date de création : 01/02/2017
Version : 1.01
Note de version : suppression de la gestion de l'offset Sticky
*/

var sticky_options = {
    stickyBlock: "#entete", // bloc cible à rendre "sticky"
    stickyBlockClass: "sticky-box", // classe du bloc cible à rendre "sticky"
    stickyClass: "is-sticky", // classe qui active le mode "sticky" selon le niveau de scroll
    stickyEvents: "load scroll", // Ne doit pas être modifié en théorie !
    stickyActiveCSS: {
        "position": "fixed", // Position "fixed" pour le mode Sticky. Ne pas modifier !
        "width": "100%", // Recommandé de fixer la largeur à 100% pour ne pas avoir de bug
        "z-index": 9999, // Recommandé de fixer un fort z-index pour passer au-dessus des contenus
        "top": 0 // Optionnel : permet ici de coller le bloc Sticky en haut du viewport
    },
};

jQuery(document).ready(function ($) {
    /*====================================*/
    /*=========== Bloc Sticky ============*/
    /*====================================*/


    // On encadre le bloc ciblé par une DIV nécessaire pour faire l'effet sticky
    $(sticky_options.stickyBlock).wrap('<div class="' + sticky_options.stickyBlockClass + '"></div>');

    // On prend les dimensions par défaut du bloc (hauteur dynamique)
    var heightSticky = Math.round($(sticky_options.stickyBlock).outerHeight());

    $(window).on(sticky_options.stickyEvents, function () {
        // Récupération de la hauteur dynamiquement à chaque scroll (pour voir si elle change...)
        if (heightSticky > Math.round($(sticky_options.stickyBlock).outerHeight())) {
            var newHeightSticky = Math.round($(sticky_options.stickyBlock).outerHeight()); // Hauteur de l'entête
        }

        // Si on scroll au niveau du bloc sticky
        if ($(window).scrollTop() > 0) {
            // Ajout de la classe d'activation du mode Sticky
            $("." + sticky_options.stickyBlockClass).addClass(sticky_options.stickyClass);

            // Récupération de la hauteur du bloc (utile si cette dernière change !)
            $("." + sticky_options.stickyBlockClass).height(newHeightSticky);

            // Application du style par défaut pour le bloc "sticky"
            $("." + sticky_options.stickyClass + " " + sticky_options.stickyBlock).css(sticky_options.stickyActiveCSS);
        } else // Si on est retourné au niveau le plus haut (donc plus de mode Sticky)
        {
            // Suppression de la class d'activation du mode Sticky
            $("." + sticky_options.stickyBlockClass).removeClass(sticky_options.stickyClass);

            // Récupération de la hauteur initiale (par défaut) du bloc "sticky"
            $("." + sticky_options.stickyBlockClass).height(heightSticky);

            // Suppression du style spécifique actif pour le mode Sticky
            $("." + sticky_options.stickyBlockClass + " " + sticky_options.stickyBlock).removeAttr('style');
        }
    });
});