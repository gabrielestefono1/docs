import estilo from "./FaqQuestion.module.scss";
import { useState } from "react";
import icon from "./icon.png";
import close from "./close.png";

export default function FaqQuestion() {
    const [clicked, setClicked] = useState(false);

    const handleClick = () => {
        setClicked(!clicked);
    };

    return (
        <div
            className={clicked ? estilo.openedQuestion : estilo.closedQuestion}
        >
            <div>
                <h2>LOREM IPSUM</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit id
                    venenatis pretium risus euismod dictum egestas orci netus
                    feugiat ut egestas.
                </p>
            </div>
            <div>
                <button onClick={handleClick}>
                    {clicked ? (
                        <img
                            src={close}
                            width={10}
                            height={10}
                            alt="Ícone fechar"
                        />
                    ) : (
                        <img
                            src={icon}
                            width={10}
                            height={10}
                            alt="Ícone mostrar"
                        />
                    )}
                </button>
            </div>
        </div>
    );
}
