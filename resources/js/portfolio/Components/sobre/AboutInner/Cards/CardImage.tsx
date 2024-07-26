import estilo from "./CardImage.module.scss";

export default function CardImage({ image }: Readonly<{ image: string }>) {
    return (
        <div className={estilo.cardimage}>
            <img
                className={estilo.image}
                src={image}
                width={50}
                height={50}
                alt="sadsad"
            />
        </div>
    );
}
