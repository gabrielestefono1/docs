import estilo from "./CardInfo.module.scss";

export default function CardInfo({
    title,
    text,
}: Readonly<{ title: string; text: string }>) {
    return (
        <div className={estilo.cardinfo}>
            <h2>{title}</h2>
            <p>{text}</p>
        </div>
    );
}
