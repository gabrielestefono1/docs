import { LottieOptions, useLottie } from "lottie-react";
import animacao from "../../../images/animations/bars.json";
import { Dispatch } from "react";
import styles from "./ButtonBars.module.scss";

interface ButtonBarsProps {
    setOpen: Dispatch<React.SetStateAction<boolean>>;
    open: boolean;
}

export default function ButtonBars({
    open,
    setOpen,
}: Readonly<ButtonBarsProps>) {
    const options: LottieOptions = {
        animationData: animacao,
        autoplay: false,
        loop: false,
    };

    const lottie = useLottie(options);

    const handleRunLottie = () => {
        lottie.setSpeed(5);
        if (!open) {
            lottie.playSegments([0, 70], true);
        } else {
            lottie.playSegments([70, 140], true);
        }
    };

    const handleToogleSidebar = () => {
        setOpen(!open);
        handleRunLottie();
    };

    return (
        <button className={styles.barsToogle} onClick={handleToogleSidebar}>
            {lottie.View}
        </button>
    );
}
