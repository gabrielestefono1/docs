import estilo from "./ContactMeMiddleLeftCard.module.scss";

interface ContactMeMiddleLeftCardProps {
    img: string;
    title: string;
    text: string;
    altText: string;
}

export default function ContactMeMiddleLeftCard({
    img,
    text,
    title,
    altText,
}: Readonly<ContactMeMiddleLeftCardProps>) {
    return (
        <div className={estilo.card}>
            <div>
                <div>
                    <div>
                        <img src={img} width={"100%"} height={"100%"} alt={altText} />
                    </div>
                </div>
            </div>
            <div>
                <h3>{title}</h3>
                <p>{text}</p>
            </div>
        </div>
    );
}
