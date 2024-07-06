import styles from "./sidebar.module.scss";
import magnifying from "./magnifying.svg";

export default function Sidebar() {
    return (
        <div className={styles.sidebar}>
            <div>
                <div>
                    <p>Spring Framework</p>
                    <button>•••</button>
                </div>
                <div>6.1.10</div>
            </div>
            <button>
                <div>
                    <img src={magnifying} alt="Pesquisar" />
                    <span>Search</span>
                </div>
                <span>CTRL + K</span>
            </button>
        </div>
    );
}
