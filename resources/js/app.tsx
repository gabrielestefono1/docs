import setupAppPortfolio from "./portfolio/app";
import setupAppReact from "./react/app";
import setupAppSpring from "./spring/app";

switch (window.location.hostname) {
    case 'webestcoding.local':
        setupAppSpring();
        break;
    case 'gabrielestefono.local':
        setupAppReact();
        break;
    default:
        setupAppPortfolio();
        break;
}