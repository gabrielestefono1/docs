import estilo from "./CardsSkillsRight.module.scss";

interface CardsSkillsRightProps {
    imagem: string;
    alt: string;
    title: string;
    text: string;
}

export default function CardsSkillsRight({
    imagem,
    alt,
    title,
    text,
}: Readonly<CardsSkillsRightProps>) {
    return (
        <div className={estilo.background}>
            <div>
                <img src={imagem} width={500} height={500} alt={alt} />
            </div>
            <h3>{title}</h3>
            <p>{text}</p>
        </div>
    );
}
