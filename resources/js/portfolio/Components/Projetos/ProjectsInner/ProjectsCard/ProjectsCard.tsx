import estilo from "./ProjectsCard.module.scss";

interface ProjectsCardProps {
    imagem: string;
    title: string;
    alt: string;
}

export default function ProjectsCard({
    alt,
    imagem,
    title,
}: Readonly<ProjectsCardProps>) {
    return (
        <div className={estilo.card}>
            <h2>{title}</h2>
            <img
                className={estilo.imagem}
                src={imagem}
                width={500}
                height={500}
                alt={alt}
            />
        </div>
    );
}
