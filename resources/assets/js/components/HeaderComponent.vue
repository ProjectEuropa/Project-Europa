<template>
	<div>
		<section class="header">
			<header class="flex container">
				<b-nav>
					<b-nav-item href="/">Top</b-nav-item>
					<b-nav-item href="/information">Information</b-nav-item>
					<b-nav-dropdown
						text="Search"
						toggle-class="nav-link-custom"
						right
					>

						<b-dropdown-item>Team Data</b-dropdown-item>
						<b-dropdown-item>Match Data</b-dropdown-item>
					</b-nav-dropdown>
					<b-nav-dropdown
						text="SUM DL"
						toggle-class="nav-link-custom"
						right
					>

						<b-dropdown-item>DL Team</b-dropdown-item>
						<b-dropdown-item>DL Match</b-dropdown-item>
					</b-nav-dropdown>
					<b-nav-item v-if="auth" href="/upload">Upload</b-nav-item>
					<b-nav-item v-else href="/simpleupload">Simple Upload</b-nav-item>


				</b-nav>

				<b-nav >
					<b-nav-item align="right" v-if="!auth" href="/login">Login</b-nav-item>
					<b-nav-item align="right" v-if="!auth" href="/register">Register</b-nav-item>

					<b-nav-dropdown
						text="Login As:"
						toggle-class="nav-link-custom"
						align="right"
						right
						v-if="auth"
						>
						<b-dropdown-item href="/mypage">My Page</b-dropdown-item>
						<b-dropdown-item href="/logout">Logout</b-dropdown-item>
					</b-nav-dropdown>
				</b-nav>
			</header>
		</section>
	</div>
</template>

<script>
export default {
	props: {
		auth: {
			type: String,
			default: null
		}
	},
	mounted() {
		this.auth = JSON.parse(this.auth);
	}
};
</script>

<style scoped>
.flex {
	display: flex;
	justify-content: space-between;
}
</style>
