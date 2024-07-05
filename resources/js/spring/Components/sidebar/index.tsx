import styles from "./sidebar.module.scss";

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
                    <img src="" alt="" />
                    <span>Search</span>
                </div>
                <span>CTRL + K</span>
            </button>
        </div>
    );
}
