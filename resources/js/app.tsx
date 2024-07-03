import setupAppReact from "./react/app";
import setupAppSpring from "./spring/app";

switch (window.location.hostname) {
    case 'webestcoding.local':
        setupAppSpring();
        break;
    default:
        setupAppReact();
        break;
}