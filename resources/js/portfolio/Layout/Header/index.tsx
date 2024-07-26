import styles from "./Header.module.scss";
import imagem from "./logo.webp";
import { useState } from "react";
import SideBar from "@/portfolio/Components/Shared/HeaderComponents/SideBar";
import LinkCustom from "../../Components/Shared/LinkCustom/LinkCustom";
import ButtonBars from "./ButtonBars";

export default function Header() {
    const [open, setOpen] = useState<boolean>(false);

    return (
        <>
            <header className={styles.header}>
                <div className={open ? styles.fixed : ""}>
                    <div>
                        <div className={styles.left}>
                            <a href="/">
                                <img
                                    src={imagem}
                                    alt="Logotipo WeBest"
                                    width={132}
                                    height={61}
                                />
                            </a>
                        </div>
                        <div className={styles.right}>
                            <LinkCustom text="Início" url="/" />
                            <LinkCustom text="Sobre mim" url="/sobre" />
                            <LinkCustom text="Projetos" url="/projetos" />
                            <LinkCustom text="Habilidades" url="/habilidades" />
                            <LinkCustom text="Contato" url="/contato" />
                            <ButtonBars setOpen={setOpen} open={open} />
                        </div>
                    </div>
                </div>
            </header>
            <SideBar open={open} />
        </>
    );
}
