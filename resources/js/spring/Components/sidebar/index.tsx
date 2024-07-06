import styles from "./sidebar.module.scss";
import SidebarGroup from "./SidebarGroup";
import SidebarItem from "./SidebarItem";

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
                    <div className={styles.magnifying}></div>
                    <span>Search</span>
                </div>
                <span>CTRL + K</span>
            </button>
            <div>
                <SidebarItem />
                <SidebarGroup />
                <SidebarGroup />
                <SidebarGroup />
                <SidebarGroup />
            </div>
        </div>
    );
}
