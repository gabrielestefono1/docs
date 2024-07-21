import estilo from "./Separator.module.scss";

interface SeparatorProps {
    titulo: string;
}

export default function Separator({ titulo }: Readonly<SeparatorProps>) {
    return (
        <div className={estilo.about}>
            <div className={estilo.titulo}>
                <div className={estilo.separator}>
                    <div className={estilo.left}></div>
                    <div className={estilo.center}>
                        <p>{titulo}</p>
                    </div>
                    <div className={estilo.right}></div>
                </div>
            </div>
        </div>
    );
}
